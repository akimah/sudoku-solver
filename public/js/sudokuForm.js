var currentCell;
var oldCell;

function cellPress(cellParent) {
    oldCell = currentCell;
    if (typeof oldCell != "undefined")
        oldCell.classList.remove("cellPressed");
    currentCell = cellParent;
    console.log(cellParent);
    console.log(cellParent);
    currentCell.classList.add("cellPressed");
}

function setCellNumber(number) {
    currentCell.getElementsByTagName("input")[0].setAttribute("value", number);
    currentCell.getElementsByTagName("span")[0].innerHTML = number;
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
    var key = String.fromCharCode(e.which);
    var value = parseInt(key);
    const MIN_RANGE = 1;
    const MAX_RANGE = 9;
    var valueInRange = value <= MAX_RANGE && value >= MIN_RANGE;
    console.log(e.which);
    console.log(key);
    console.log(value);
    if (valueInRange)
        setCellNumber(value);
});