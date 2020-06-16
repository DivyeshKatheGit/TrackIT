const range = document.getElementById('range');
const percent = document.querySelector('.percent');
const circle = document.getElementById('c2');
range.addEventListener('change',()=>
{
    let value = range.value;
    percent.innerHTML = value+"<span>%</span>";
    circle.style.strokeDashoffset = 'calc(1070 - (1070*'+value+')/100)';
})