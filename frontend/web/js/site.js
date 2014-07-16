//id为你要显示或隐藏层的ID值,point为你的鼠标状态(移上去,或移出)
function showMenu(id, point) {
    if (point == "over")
    {
        document.getElementById(id).className = "hiddenDiv showDiv";
    }
    else
    {
        document.getElementById(id).className = "hiddenDiv";
    }
}