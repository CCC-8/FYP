@extends('Organizer/_ORGANIZER')
@section('body')
    <div class="container" style="width: 95%; padding: 3% 0 0 3%;">
        <canvas id="fabricCanvas" width="1000" height="550" style="border: black 2px solid"></canvas>
        <img id="floorPlanImage" src="{{ asset('storage/' . $defaultFloorPlan) }}" alt="Floor Plan Image">
        <button id="drawRectangle">Rectangle</button>
        <button id="drawCircle">Circle</button>
        <button id="drawFreehand">Pencil</button>
        <button id="addText">Text</button>
        <button id="eraser">Eraser</button>
        <button id="undo">Undo</button>
        <button type="submit" id="saveCanvas">Save</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.6.0/fabric.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = new fabric.Canvas('fabricCanvas');

            fabric.Image.fromURL(document.getElementById('floorPlanImage').src, function(img) {
                canvas.setWidth(img.width);
                canvas.setHeight(img.height);
                canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
            });

            var drawingMode = false;
            var eraseMode = false;
            var undoHistory = [];

            function toggleMode(mode) {
                drawingMode = mode === 'draw';
                eraseMode = mode === 'erase';
                canvas.isDrawingMode = drawingMode;
                canvas.freeDrawingBrush = eraseMode ? new fabric.PencilBrush(canvas) : new fabric.PencilBrush(
                    canvas);
                canvas.freeDrawingBrush.color = eraseMode ? 'rgba(0,0,0,0)' : 'black';
                canvas.freeDrawingBrush.width = 3;
            }

            var canvasModifications = @json($canvasModifications);
            canvas.loadFromJSON(canvasModifications, function() {
                canvas.renderAll();
            });

            document.getElementById('addText').addEventListener('click', function() {
                var text = new fabric.Textbox('Your Text', {
                    left: 200,
                    top: 200,
                    fontSize: 20,
                    fill: 'black',
                    borderColor: 'black',
                    cornerColor: 'black',
                    cornerSize: 6,
                    transparentCorners: false
                });
                canvas.add(text);
                saveCanvasState();
            });

            document.getElementById('drawRectangle').addEventListener('click', function() {
                toggleMode('draw');
                canvas.isDrawingMode = false;
                var rect = new fabric.Rect({
                    left: 100,
                    top: 100,
                    width: 50,
                    height: 50,
                    fill: 'black'
                });
                canvas.add(rect);
                saveCanvasState();
            });

            document.getElementById('drawCircle').addEventListener('click', function() {
                toggleMode('draw');
                canvas.isDrawingMode = false;
                var circle = new fabric.Circle({
                    left: 150,
                    top: 150,
                    radius: 30,
                    fill: 'black'
                });
                canvas.add(circle);
                saveCanvasState();
            });

            document.getElementById('drawFreehand').addEventListener('click', function() {
                toggleMode('draw');
            });

            document.getElementById('eraser').addEventListener('click', function() {
                toggleMode('erase');
            });

            document.getElementById('undo').addEventListener('click', function() {
                if (undoHistory.length > 1) {
                    undoHistory.pop();
                    var lastAction = undoHistory[undoHistory.length - 1];
                    canvas.loadFromJSON(lastAction, function() {
                        canvas.renderAll();
                    });
                }
            });

            canvas.on('mouse:down', function(options) {
                if (eraseMode) {
                    var pointer = canvas.getPointer(options.e);
                    var obj = canvas.getActiveObject(pointer);
                    if (obj) {
                        canvas.remove(obj);
                        saveCanvasState();
                    }
                }
            });

            function saveCanvasState() {
                undoHistory.push(JSON.stringify(canvas));
            }

            document.getElementById('saveCanvas').addEventListener('click', function() {
                const modifiedCanvas = JSON.stringify(canvas.toJSON());

                // Send modified canvas data to the server using fetch or AJAX
                fetch(`/venues/{{ $venue->id }}/save-canvas`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            modifiedCanvasData: modifiedCanvas
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .then(data => {
                        console.log(data); // Handle success response
                        // Optionally, show a success message to the user
                    })
                    .catch(error => {
                        console.error('There was a problem saving the canvas:', error);
                        // Optionally, show an error message to the user
                    });
            });

            canvas.on('object:modified', function() {
                saveCanvasState();
            });
        });
    </script>
@endsection
