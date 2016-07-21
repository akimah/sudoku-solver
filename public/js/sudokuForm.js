var currentCell;
var oldCell;

function cellPress(cell, event) {
    oldCell = currentCell;
    if (typeof oldCell != "undefined")
        oldCell.classList.remove("cellPressed");
    currentCell = cell;
    currentCell.classList.add("cellPressed");
}

function setCellNumber(number) {
    currentCell.setAttribute("value", number);
}

function resetCells() {
    for (var vertical = 1; vertical <= 9; vertical++) {
        for (var horizontal = 1; horizontal <= 9; horizontal++) {
            var id = "";
            id += vertical;
            id += horizontal;
            var cell = document.getElementById(id);
            cell.setAttribute("value", "");
        }
    }
}

$(document).on("keypress", function (e) {
    var key = String.fromCharCode(e.keyCode);
    var value = parseInt(key);
    const MIN_RANGE = 1;
    const MAX_RANGE = 9;
    var valueInRange = value <= MAX_RANGE && value >= MIN_RANGE;
    if (valueInRange)
        currentCell.setAttribute("value", key);
});