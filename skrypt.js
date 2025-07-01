class Disappear {
    constructor (obj, obj2, obj3){
    this.tag=obj;
    this.tag2=obj2;
    this.tag3=obj3;}

    change_class (){            
        this.tag.addEventListener('click', () => {
        this.tag2.classList.remove('this_field_in');
        this.tag2.classList.add('this_field_out');
        this.tag3.classList.remove('this_field_out');
        this.tag3.classList.add('this_field_in');});
    };
    
    
};

class Send_options{
    constructor (obj){
        this.tag=obj;
       }

       send(){
    this.tag.addEventListener('click',() => {
    // Pobieranie zaznaczonych opcji
    const selectedLanguages = [];
    document.querySelectorAll('select[name]').forEach(select => {
        if (select.className == 'this_field_in')
            selectedLanguages.push(select.value);           
        
    });
     // Wysyłanie danych do skryptu PHP za pomocą AJAX
     const data = new URLSearchParams();
     data.append('languages', JSON.stringify(selectedLanguages));
 
     const xhr = new XMLHttpRequest();
     xhr.open('POST', 'skrypt.php', true);
     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 
     xhr.onload  = function () {
         if (xhr.status === 200) {
             alert('Dane zostały zapisane');
             
         } else {
             alert('Błąd wysyłania danych');
         }
     }
 
     xhr.send(data.toString());
 })}};

 class Add_from_input{
    constructor(object, object2, object3){
        this.tagg=object;
        this.tagg2=object2;
        this.nextTab=object3;}

        upload(){
            this.tagg2.addEventListener('click', () => {
              
               let langgg = this.tagg.value;
               
               const data = new URLSearchParams();
               data.append(this.nextTab, langgg);
         
               const xhr = new XMLHttpRequest();
               xhr.open('POST', 'skrypt.php', true);
               xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                
               xhr.onload = function () {
                  if (xhr.status === 200) {
                     alert("dane zostały zapisane");
                  } else {
                     alert('Błąd wysyłania danych');
                  }
               }
               xhr.send(data.toString());
            })
         }
}

document.addEventListener('DOMContentLoaded', () =>{
let prog = document.getElementById('prog');
let add_prog = document.getElementById('add_prog');

const program = new Add_from_input(prog,add_prog,'programs');
program.upload();

let other_technology = document.getElementById('other_technology');
let next_tech = document.getElementById('next_tech');

const technology = new Add_from_input(other_technology,next_tech,'programs');
technology.upload();

let this_frame = document.getElementById('this_frame');
let next_frame = document.getElementById('next_frame');

const fram = new Add_from_input(this_frame,next_frame,'frameworks');
fram.upload();

let this_skill = document.getElementById('this_skill');
let next_skill = document.getElementById('next_skill');

const skil = new Add_from_input(this_skill,next_skill,'skills');
skil.upload();})
 



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

let ang = document.getElementById('ang');
let de = document.getElementById('de');
let fr = document.getElementById('fr');
let ru = document.getElementById('ru');
let la = document.getElementById('la');

/*let ccc = new Send_checkobox(go,this_field,this_field2);
ccc.change_class();*/

const cos_tam = new Disappear(go,this_field,this_field2);
cos_tam.change_class();
const cos_tam2 = new Disappear(go2,this_field2,this_field3);
cos_tam2.change_class();
const cos_tam3 = new Disappear(go3,this_field3,this_field4);
cos_tam3.change_class();
const cos_tam4 = new Disappear(go4,this_field4,this_field5);
cos_tam4.change_class();
const cos_tam5 = new Disappear(go5,this_field5,this_field6);
cos_tam5.change_class();
const cos_tam6 = new Disappear(go6,this_field6,this_field7);
cos_tam6.change_class();

class Zmien{
    obj1=[];
    constructor(tag,obj1){
        this.tag = tag;
        this.obj1 = obj1;
    }

zmien(){
    this.tag.addEventListener('change', () =>{
        if(this.tag.checked){
           this.obj1.forEach(element => {
            element.style.display="inline";
           });     
        } 
        else{
            this.obj1.forEach(element=> {
            element.style.display="none";
        });
            }
        });
    }
}

let zmienna = document.getElementById('inny');
let inne = document.querySelectorAll('.other');

let tech = document.getElementById('tech');
let other_tech = document.querySelectorAll('.other_tech');

let frame = document.getElementById('frame');
let other_frame = document.querySelectorAll('.other_frame');

let skill = document.getElementById('skill');
let other_skill = document.querySelectorAll('.other_skill');


let zmiana = new Zmien(zmienna,inne);
zmiana.zmien();

let zmiana1 = new Zmien(tech,other_tech);
zmiana1.zmien();

let zmiana2 = new Zmien(frame,other_frame);
zmiana2.zmien();

let zmiana3 = new Zmien(skill, other_skill);
zmiana3.zmien();

    

class Language{
    constructor(obj, obj2){
        this.tag = obj;
        this.tag2 = obj2;}

        change_class1(){
            this.tag.addEventListener('change', () => {
                if (this.tag2.className == "this_field_out"){
                this.tag2.classList.remove('this_field_out');
                this.tag2.classList.add('this_field_in');
               }
                else {
                    this.tag2.classList.remove('this_field_in');
                    this.tag2.classList.add('this_field_out');
                 
                }
            }
        )            
        }
        };




let langA = new Language(ang, l_ang);
langA.change_class1();
let langD = new Language(de, l_de);
langD.change_class1();
let langF = new Language(fr, l_fr);
langF.change_class1();
let langR = new Language(ru, l_ru);
langR.change_class1();
let langL = new Language(la, l_la);
langL.change_class1();


let add_lang = document.getElementById('add_lang');
let angielski = new Send_options(add_lang);
angielski.send();


 //let l_ang = document.getElementById('l_ang');

