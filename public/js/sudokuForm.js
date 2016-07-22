var currentCell;
var oldCell;

function cellPress(cellParent) {
    oldCell = currentCell;
    if (typeof oldCell != "undefined")
        oldCell.classList.remove("cellPressed");
    currentCell = cellParent;
    currentCell.classList.add("cellPressed");
}

function setCellNumber(number) {
    if (typeof currentCell == "undefined") return;
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

$(document).on("keyup", function (e) {
    var key = String.fromCharCode(e.which);
    var value = parseInt(key);
    const MIN_RANGE = 1;
    const MAX_RANGE = 9;
    const BTN_DEL = 8;
    const BTN_SUPR = 46;
    const BTN_ZERO = 0;
    const removeButton = e.which == BTN_DEL || e.which == BTN_SUPR || e.which == BTN_ZERO;
    var valueInRange = value <= MAX_RANGE && value >= MIN_RANGE;
    if (valueInRange)
        setCellNumber(value);
    if (removeButton)
        setCellNumber("");
});