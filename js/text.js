const burger = document.querySelector('.burger-menu');
const line_1 = document.querySelector('.line-1');
const line_2 = document.querySelector('.line-2');
const line_3 = document.querySelector('.line-3');
const menu = document.querySelector('.menusec');
const menu_list_active = document.querySelector('.menu-list-active');
const menu_text = document.querySelector('.menu-text');
const list_text = document.querySelectorAll('.list-text');
console.log(list_text);
let active = false;
burger.addEventListener('click',()=>
{
    if(active == false)
    {
        line_1.style.transform = 'rotate(-45deg) translate(-2px,0px)';
        line_2.style.transform = 'rotate(45deg)';
        line_3.style.transform = 'rotate(-45deg) translate(2px,1px)';
        //menu_list_active.style.display = 'block';
        //menu_text.style.display = "block";
        for(let i =0 ;i<list_text.length;i++)
        {
            list_text[i].style.display = "block";
        }
        menu.classList.add('active');
        active = true;
    }
    else
    {
        line_1.style.transform = 'rotate(0deg)';
        line_2.style.transform = 'rotate(0deg)';
        line_3.style.transform = 'rotate(0deg)';
        //menu_text.style.display = "none";
        for(let i =0 ;i<list_text.length;i++)
        {
            list_text[i].style.display = "none";
        }
        menu.classList.remove('active');
        active = false;
    }
})


