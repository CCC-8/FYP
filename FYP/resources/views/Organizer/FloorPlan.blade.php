@extends('Organizer/_ORGANIZER')
@section('body')
    @php
        $floorPlanData = json_decode($eventVenue->floor_plan, true);
        $canvasModifications = $floorPlanData['canvas_modifications'] ?? null;
        $floorPlanImagePath = $floorPlanData['floor_plan_image'] ?? null;
    @endphp
    <div class="container" style="width: 95%; padding: 3% 0 0 3%;">
        <form action="FloorPlan/{{ $eventVenue->event_id }}/{{ $eventVenue->venue_id }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <canvas id="fabricCanvas" width="1000" height="550" style="border: black 2px solid"></canvas>

            <input type="hidden" id="canvasModifications" name="canvasModifications">
            <button id="drawRectangle">Rectangle</button>
            <button id="drawCircle">Circle</button>
            <button id="drawFreehand">Pencil</button>
            <button id="addText">Text</button>
            <button id="eraser">Eraser</button>
            <button id="undo">Undo</button>
            <button type="submit" id="saveToDB">Save</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = new fabric.Canvas('fabricCanvas');

            var drawingMode = false;
            var eraseMode = false;
            var undoHistory = [];

            // Toggle drawing modes
            function toggleMode(mode) {
                drawingMode = mode === 'draw';
                eraseMode = mode === 'erase';
                canvas.isDrawingMode = drawingMode;
                canvas.freeDrawingBrush = eraseMode ? new fabric.PencilBrush(canvas) : new fabric.PencilBrush(
                    canvas);
                canvas.freeDrawingBrush.color = eraseMode ? 'rgba(0,0,0,0)' : 'black';
                canvas.freeDrawingBrush.width = 3;
            }

            var img = new Image();
            img.onload = function() {
                var floorPlan = new fabric.Image(img, {
                    left: 0,
                    top: 0,
                });
                canvas.add(floorPlan);
            };
            if ($floorPlanImagePath) {
                img.src = '{{ asset('storage/' . $floorPlanImagePath) }}';
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

            canvas.on('object:modified', function() {
                saveCanvasState();
            });
        });
    </script>
@endsection
