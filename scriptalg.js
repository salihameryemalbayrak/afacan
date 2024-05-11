var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");

var x = canvas.width / 2;
var y = canvas.height / 2;
var speed = 20; 
var moves = [];
var isAnimating = false;
var points = []; 


drawPoint(x, y);

function allowDrop(event) {
    event.preventDefault();
}

function drag(event, direction) {
    event.dataTransfer.setData("text/plain", direction);
    event.dataTransfer.setData("color", event.target.style.backgroundColor);
    event.dataTransfer.setData("id", event.target.id);
}

function drop(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData("text/plain");
    const id = event.dataTransfer.getData("id");
    const color = event.dataTransfer.getData("color");

    const tool = document.createElement("div");
    tool.className = "tool";
    tool.innerText = data;
    tool.id=id;
    tool.style.backgroundColor=color;
    

    var deleteIcon = document.createElement("span");
    deleteIcon.className = "delete-icon";
    deleteIcon.innerHTML = "&#10006;";
    deleteIcon.onclick = function () {
        tool.remove();
    };
    tool.appendChild(deleteIcon);

    event.target.appendChild(tool);
}

function startMoving() {
    if (!isAnimating) {
        isAnimating = true;
        animate();
    }
}

function animate() {
    moves = [];
    var tools = document.getElementById("drop-area").getElementsByClassName("tool");
    for (var i = 0; i < tools.length; i++) {
        moves.push(tools[i].innerText);
    }

    performMoves(0);
}

function performMoves(index) {
    if (index < moves.length) {
        move(moves[index]);
        setTimeout(function() {
            performMoves(index + 1);
        }, 500);
    } else {
        isAnimating = false;
    }
}

function move(direction) {
    switch (direction) {
        case 'Yukarı':
            y = Math.max(0, y - speed);
            break;
        case 'Sağ':
            x = Math.min(canvas.width, x + speed);
            break;
        case 'Sol':
            x = Math.max(0, x - speed);
            break;
        case 'Aşağı':
            y = Math.min(canvas.height, y + speed);
            break;
    }

  
    ctx.clearRect(0, 0, canvas.width, canvas.height);

 
    ctx.fillStyle = "lightgrey"; 
    for (var i = 0; i < points.length; i++) {
        ctx.beginPath();
        ctx.arc(points[i].x, points[i].y, 6, 0, 2 * Math.PI); 
       
        ctx.fill();
        ctx.closePath();
    }

    drawPoint(x, y);
}

function drawPoint(x, y) {
    ctx.beginPath();
    ctx.arc(x, y, 15, 0, 2 * Math.PI); 
    ctx.fillStyle = "purple"; 
    ctx.fill();
    ctx.closePath();

    points.push({ x: x, y: y });
}
