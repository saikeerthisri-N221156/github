
console.log("hello world");
// TASK 1 variable declaration
var Name = "keerthi";
let age = 20;
const country = "India";

console.log("Name: " , Name);
console.log("Age: " + age);
console.log("Country: " + country);

//TASK 2 BASIC FUNCTIONS
//defining a function
function hello(){
    console.log("function in javascript");
}
hello();

//function with parameters
function greet(name){
    console.log("Hello ",name);
}
greet("keerthi");

//arrow functions
const arrowfun = (name) =>{
    console.log(name,"!this is an arrow function");
}
arrowfun("keerthi");

//arrow function for addition and subtraction
const add=(a,b)=>{
    console.log("addition:",a+b);
    
}
add(10,20);

const sub=(x,y) => x-y;
const mult=(x,y) => x*y;
console.log("subtraction of 10 and 5 is: ",sub(10,5));
console.log("multiplication of 10 and 5 is: ",mult(10,5));






