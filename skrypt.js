class disappear {
    constructor (obj, obj2, obj3){
    this.tag=obj;
    this.tag2=obj2;
    this.tag3=obj3;

    this.change_class = () => {            
        this.tag.addEventListener('click', () => {
        this.tag2.classList.remove('this_field_in');
        this.tag2.classList.add('this_field_out');
        this.tag3.classList.remove('this_field_out');
        this.tag3.classList.add('this_field_in');});
    };
}};
        
let this_field = document.getElementById('this_field');
let this_field2 = document.getElementById('this_field2');
let this_field3 = document.getElementById('this_field3');
let this_field4 = document.getElementById('this_field4');
let this_field5 = document.getElementById('this_field5');
let this_field6 = document.getElementById('this_field6');
let this_field7 = document.getElementById('this_field7');

let go = document.getElementById('go');
let go2 = document.getElementById('go2');
let go3 = document.getElementById('go3');
let go4 = document.getElementById('go4');
let go5 = document.getElementById('go5');
let go6 = document.getElementById('go6');



let cos_tam = new disappear(go,this_field,this_field2);
cos_tam.change_class();
const cos_tam2 = new disappear(go2,this_field2,this_field3);
cos_tam2.change_class();
const cos_tam3 = new disappear(go3,this_field3,this_field4);
cos_tam3.change_class();
const cos_tam4 = new disappear(go4,this_field4,this_field5);
cos_tam4.change_class();
const cos_tam5 = new disappear(go5,this_field5,this_field6);
cos_tam5.change_class();
const cos_tam6 = new disappear(go6,this_field6,this_field7);
cos_tam6.change_class();

let zmienna = document.getElementById('inny');
let inne = document.getElementsByClassName('other');

let tech = document.getElementById('tech');
let other_tech = document.getElementsByClassName('other_tech');

let frame = document.getElementById('frame');
let other_frame = document.getElementsByClassName('other_frame');

let skill = document.getElementById('skill');
let other_skill = document.getElementsByClassName('other_skill');

zmienna.addEventListener('change', function(){
if(inne[0].style.display=="none" && inne[1].style.display=="none"){
    inne[0].style.display="inline";
    inne[1].style.display="inline";}

else{inne[0].style.display="none";
    inne[1].style.display="none";}
}) 

tech.addEventListener('change', function(){
if(other_tech[0].style.display=="none" && other_tech[1].style.display=="none"){
    other_tech[0].style.display="inline";
    other_tech[1].style.display="inline";}

else{other_tech[0].style.display="none";
    other_tech[1].style.display="none";}
}) 
frame.addEventListener('change', function(){
if(other_frame[0].style.display=="none" && other_frame[1].style.display=="none"){
    other_frame[0].style.display="inline";
    other_frame[1].style.display="inline";}

else{other_frame[0].style.display="none";
    other_frame[1].style.display="none";}
}) 

skill.addEventListener('change', function(){
if(other_skill[0].style.display=="none" && other_skill[1].style.display=="none"){
    other_skill[0].style.display="inline";
    other_skill[1].style.display="inline";}

else{other_skill[0].style.display="none";
    other_skill[1].style.display="none";}
}) 