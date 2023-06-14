window.onload = function init() {
    makeSelected();
}

function makeSelected () {
    const selectObj = document.querySelector('#cat');
    ind = selectObj.dataset.selected;
    console.log(ind);
    selectObj.options[ind-1].selected = true;
}

