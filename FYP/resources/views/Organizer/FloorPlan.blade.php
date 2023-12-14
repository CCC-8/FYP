<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #272D2D;
        }

        .container {
            display: flex;
            width: 100%;
            gap: 10px;
            padding: 10px;
            max-width: 1050px;
        }

        section {
            background: #EDF5FC;
            border-radius: 7px;
        }

        .tools-board {
            width: 210px;
            padding: 15px 22px 0;
        }

        .tools-board .row {
            margin-bottom: 20px;
        }

        .row .options {
            list-style: none;
            margin: 10px 0 0 5px;
        }

        .row .options .option {
            display: flex;
            cursor: pointer;
            align-items: center;
            margin-bottom: 10px;
        }

        .option:is(:hover, .active) img {
            filter: invert(17%) sepia(90%) saturate(3000%) hue-rotate(900deg) brightness(100%) contrast(100%);
        }

        .option :where(span, label) {
            color: #5A6168;
            cursor: pointer;
            padding-left: 10px;
        }

        .option:is(:hover, .active) :where(span, label) {
            color: #4A98F7;
        }

        .option #fill-color {
            cursor: pointer;
            height: 14px;
            width: 14px;
        }

        #fill-color:checked~label {
            color: #4A98F7;
        }

        .option #size-slider {
            width: 100%;
            height: 5px;
            margin-top: 10px;
        }

        .colors .options {
            display: flex;
            justify-content: space-between;
        }

        .colors .option {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            margin-top: 3px;
            position: relative;
        }

        .colors .option:nth-child(1) {
            background-color: #fff;
            border: 1px solid #bfbfbf;
        }

        .colors .option:nth-child(2) {
            background-color: #000;
        }

        .colors .option:nth-child(3) {
            background-color: #E02020;
        }

        .colors .option:nth-child(4) {
            background-color: #6DD400;
        }

        .colors .option:nth-child(5) {
            background-color: #4A98F7;
        }

        .colors .option.selected::before {
            position: absolute;
            content: "";
            top: 50%;
            left: 50%;
            height: 12px;
            width: 12px;
            background: inherit;
            border-radius: inherit;
            border: 2px solid #fff;
            transform: translate(-50%, -50%);
        }

        .colors .option:first-child.selected::before {
            border-color: #ccc;
        }

        .option #color-picker {
            opacity: 0;
            cursor: pointer;
        }

        .buttons button {
            width: 100%;
            color: #fff;
            border: none;
            outline: none;
            padding: 11px 0;
            font-size: 0.9rem;
            margin-bottom: 13px;
            background: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .buttons .floorPlanImage {
            background: #B0A990;
            color: #fff;
        }

        .buttons .clear-canvas {
            color: #fff;
            background: #7D7461;
        }

        .buttons .save-to-db {
            background: #202030;
            color: #fff;
        }

        .buttons .save-img {
            background: #39304A;
        }

        .drawing-board {
            flex: 1;
            overflow: hidden;
        }

        .drawing-board canvas {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <section class="tools-board">
            <div class="row">
                <label class="title"><strong>Shapes</strong></label>
                <ul class="options">
                    <li class="option tool" id="rectangle">
                        <img src="icons/rectangle.svg" alt="">
                        <span>Rectangle</span>
                    </li>
                    <li class="option tool" id="circle">
                        <img src="icons/circle.svg" alt="">
                        <span>Circle</span>
                    </li>
                    <li class="option tool" id="triangle">
                        <img src="icons/triangle.svg" alt="">
                        <span>Triangle</span>
                    </li>
                    <li class="option">
                        <input type="checkbox" id="fill-color">
                        <label for="fill-color">Fill color</label>
                    </li>
                </ul>
            </div>
            <div class="row">
                <label class="title"><strong>Options</strong></label>
                <ul class="options">
                    <li class="option active tool" id="brush">
                        <img src="icons/brush.svg" alt="">
                        <span>Brush</span>
                    </li>
                    <li class="option tool" id="eraser">
                        <img src="icons/eraser.svg" alt="">
                        <span>Eraser</span>
                    </li>
                    <li class="option">
                        <input type="range" id="size-slider" min="1" max="30" value="5">
                    </li>
                </ul>
            </div>
            <div class="row colors">
                <label class="title"><strong>Colors</strong></label>
                <ul class="options">
                    <li class="option"></li>
                    <li class="option selected"></li>
                    <li class="option"></li>
                    <li class="option"></li>
                    <li class="option">
                        <input type="color" id="color-picker" value="#4A98F7">
                    </li>
                </ul>
            </div>
            <div class="row buttons">
                <section class="image-upload">
                    <label for="upload-image" class="title">Add Image</label>
                    <input type="file" id="upload-image" accept="image/*" style="color: transparent">
                    <div class="image-controls">
                        <label for="image-scale">Scale:</label>
                        <input type="range" id="image-scale" min="0.1" max="2" step="0.1"
                            value="1">
                    </div>
                </section><br>
                <button class="floorPlanImage">Load Floor Plan</button>
                <button class="clear-canvas">Clear Canvas</button>
                <button class="save-img">Save As Image</button>
                <button class="save-to-db">Save To Database</button>
            </div>
        </section>
        @if ($event->floorPlan)
            <img src="{{ asset('images/' . $event->floorPlan) }}" alt="Floor Plan" id="floorPlanImage"
                style="display: none;">
        @endif
        <input type="hidden" id="canvasData" name="canvasData" value="">
        <section class="drawing-board">
            <canvas></canvas>
        </section>
    </div>

</body>

<script>
    const canvas = document.querySelector("canvas"),
        toolBtns = document.querySelectorAll(".tool"),
        fillColor = document.querySelector("#fill-color"),
        sizeSlider = document.querySelector("#size-slider"),
        colorBtns = document.querySelectorAll(".colors .option"),
        colorPicker = document.querySelector("#color-picker"),
        uploadImage = document.getElementById("upload-image"),
        imageScaleInput = document.getElementById("image-scale"),
        clearCanvas = document.querySelector(".clear-canvas"),
        saveImg = document.querySelector(".save-img"),
        floorPlanImage = document.getElementById("floorPlanImage"),
        loadFloorPlanBtn = document.querySelector(".floorPlanImage"),
        saveToDBButton = document.querySelector('.save-to-db'),
        form = document.getElementById('floorPlanForm'),
        ctx = canvas.getContext("2d");

    let uploadedImage = null;

    loadFloorPlanBtn.addEventListener("click", () => {
        const venue = "{{ $event->venue }}";
        if (venue === "Paddock Club" || venue === "Perdana Suite") {
            alert(`The floor plan for ${venue} is not available, but you can still edit on the canvas.`);
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        } else if ("{{ $event->floorPlan }}") {
            floorPlanImage.src = "/images/{{ $event->floorPlan }}";
            floorPlanImage.onload = () => {
                drawFloorPlan();
            };
        }
    });

    function drawFloorPlan() {
        // Clear the canvas before loading a new floor plan
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Check if floorPlanImage exists and is loaded
        if (floorPlanImage && floorPlanImage.complete) {
            canvas.width = floorPlanImage.width;
            canvas.height = floorPlanImage.height;
            ctx.drawImage(floorPlanImage, 0, 0);
            adjustCanvasSize(floorPlanImage.width, floorPlanImage.height);
        } else {
            // Set default canvas dimensions if floorPlanImage is not loaded
            const defaultWidth = 800; // Set your default width
            const defaultHeight = 600; // Set your default height
            canvas.width = defaultWidth;
            canvas.height = defaultHeight;
            adjustCanvasSize(defaultWidth, defaultHeight);
        }
    }

    floorPlanImage.onload = drawFloorPlan;
    floorPlanImage.onerror = function() {
        console.error("Error loading the floor plan image");
    };

    function adjustCanvasSize(width, height) {
        // Set canvas width and height in CSS for proper display
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        // Redraw the canvas content after adjusting the size
        redrawCanvas();
    }

    function redrawCanvas() {
        // Clear canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        // Redraw floor plan if available
        if (floorPlanImage && floorPlanImage.complete) {
            ctx.drawImage(floorPlanImage, 0, 0);
        }
    }

    uploadImage.addEventListener("change", (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = new Image();
                img.onload = function() {
                    uploadedImage = img;
                    drawImage();
                };
                img.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    const drawImage = () => {
        if (uploadedImage) {
            const scale = imageScaleInput.value;
            const scaledWidth = uploadedImage.width * scale;
            const scaledHeight = uploadedImage.height * scale;

            // Clear canvas before drawing the image
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            setCanvasBackground();

            // Draw the uploaded image onto the canvas
            ctx.drawImage(uploadedImage, 0, 0, scaledWidth, scaledHeight);
        }
    };

    imageScaleInput.addEventListener("input", drawImage);

    // global variables with default value
    let prevMouseX, prevMouseY, snapshot,
        isDrawing = false,
        selectedTool = "brush",
        brushWidth = 5,
        selectedColor = "#000";

    const setCanvasBackground = () => {
        // setting whole canvas background to white, so the downloaded img background will be white
        ctx.fillStyle = "#EDF5FC";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = selectedColor; // setting fillstyle back to the selectedColor, it'll be the brush color
    }

    window.addEventListener("load", () => {
        // setting canvas width/height.. offsetwidth/height returns viewable width/height of an element
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
        setCanvasBackground();
    });

    const drawRect = (e) => {
        // if fillColor isn't checked draw a rect with border else draw rect with background
        if (!fillColor.checked) {
            // creating circle according to the mouse pointer
            return ctx.strokeRect(e.offsetX, e.offsetY, prevMouseX - e.offsetX, prevMouseY - e.offsetY);
        }
        ctx.fillRect(e.offsetX, e.offsetY, prevMouseX - e.offsetX, prevMouseY - e.offsetY);
    }

    const drawCircle = (e) => {
        ctx.beginPath(); // creating new path to draw circle
        // getting radius for circle according to the mouse pointer
        let radius = Math.sqrt(Math.pow((prevMouseX - e.offsetX), 2) + Math.pow((prevMouseY - e.offsetY), 2));
        ctx.arc(prevMouseX, prevMouseY, radius, 0, 2 * Math.PI); // creating circle according to the mouse pointer
        fillColor.checked ? ctx.fill() : ctx
            .stroke(); // if fillColor is checked fill circle else draw border circle
    }

    const drawTriangle = (e) => {
        ctx.beginPath(); // creating new path to draw circle
        ctx.moveTo(prevMouseX, prevMouseY); // moving triangle to the mouse pointer
        ctx.lineTo(e.offsetX, e.offsetY); // creating first line according to the mouse pointer
        ctx.lineTo(prevMouseX * 2 - e.offsetX, e.offsetY); // creating bottom line of triangle
        ctx.closePath(); // closing path of a triangle so the third line draw automatically
        fillColor.checked ? ctx.fill() : ctx.stroke(); // if fillColor is checked fill triangle else draw border
    }

    const startDraw = (e) => {
        isDrawing = true;
        prevMouseX = e.offsetX; // passing current mouseX position as prevMouseX value
        prevMouseY = e.offsetY; // passing current mouseY position as prevMouseY value
        ctx.beginPath(); // creating new path to draw
        ctx.lineWidth = brushWidth; // passing brushSize as line width
        ctx.strokeStyle = selectedColor; // passing selectedColor as stroke style
        ctx.fillStyle = selectedColor; // passing selectedColor as fill style
        // copying canvas data & passing as snapshot value.. this avoids dragging the image
        snapshot = ctx.getImageData(0, 0, canvas.width, canvas.height);
    }

    const drawing = (e) => {
        if (!isDrawing) return; // if isDrawing is false return from here
        ctx.putImageData(snapshot, 0, 0); // adding copied canvas data on to this canvas

        if (selectedTool === "brush" || selectedTool === "eraser") {
            // if selected tool is eraser then set strokeStyle to white 
            // to paint white color on to the existing canvas content else set the stroke color to selected color
            ctx.strokeStyle = selectedTool === "eraser" ? "#EDF5FC" : selectedColor;
            ctx.lineTo(e.offsetX, e.offsetY); // creating line according to the mouse pointer
            ctx.stroke(); // drawing/filling line with color
        } else if (selectedTool === "rectangle") {
            drawRect(e);
        } else if (selectedTool === "circle") {
            drawCircle(e);
        } else {
            drawTriangle(e);
        }
    }

    toolBtns.forEach(btn => {
        btn.addEventListener("click", () => { // adding click event to all tool option
            // removing active class from the previous option and adding on current clicked option
            document.querySelector(".options .active").classList.remove("active");
            btn.classList.add("active");
            selectedTool = btn.id;
        });
    });

    sizeSlider.addEventListener("change", () => brushWidth = sizeSlider.value); // passing slider value as brushSize

    colorBtns.forEach(btn => {
        btn.addEventListener("click", () => { // adding click event to all color button
            // removing selected class from the previous option and adding on current clicked option
            document.querySelector(".options .selected").classList.remove("selected");
            btn.classList.add("selected");
            // passing selected btn background color as selectedColor value
            selectedColor = window.getComputedStyle(btn).getPropertyValue("background-color");
        });
    });

    colorPicker.addEventListener("change", () => {
        // passing picked color value from color picker to last color btn background
        colorPicker.parentElement.style.background = colorPicker.value;
        colorPicker.parentElement.click();
    });

    clearCanvas.addEventListener("click", () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // clearing whole canvas
        setCanvasBackground();
    });

    saveImg.addEventListener("click", () => {
        const link = document.createElement("a"); // creating <a> element
        link.download = `${Date.now()}.jpg`; // passing current date as link download value
        link.href = canvas.toDataURL(); // passing canvasData as link href value
        link.click(); // clicking link to download image
    });

    saveToDBButton.addEventListener("click", () => {
        // Get the canvas data URL
        const canvasData = canvas.toDataURL();

        const eventId = {{ $event->id }};
        const url = `/updateFloorPlan/${eventId}`;

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                body: JSON.stringify({
                    canvasData
                })
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = '/EventManagement';
                    alert('Floor plan saved to database successfully!');
                } else {
                    console.log('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    canvas.addEventListener("mousedown", startDraw);
    canvas.addEventListener("mousemove", drawing);
    canvas.addEventListener("mouseup", () => isDrawing = false);
</script>

</html>
