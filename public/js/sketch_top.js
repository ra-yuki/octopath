
///////////////////////////////////////////////
// Main
///////////////////////////////////////////////
//canvas variables
const BG_COLOR = {'r': 0, 'g': 11, 'b': 41};
var canvas;
//images to load
var img;
//bubble variables
const B_NUM = 10;
const B_SIZE = {'min': 10, 'max': 40};
const B_SPD = 0.05;
const B_COLOR = {'r': 237, 'g': 184, 'b': 61};//{'r': 215, 'g': 0, 'b': 38};//{'r': 248, 'g': 245, 'b': 242};
var b = [];
//octopath variables
const O_COLOR = {'r': 248, 'g': 245, 'b': 242};//{'r': 237, 'g': 184, 'b': 61};
const C_INV_VAL = 60;
var oct;

function preload(){
    img = loadImage(assetBasePath+"img/octopath/octopath_s.png");
}

function setup(){
    InitCanvas();
    Init();
}

function draw(){
    Update();
    Draw();
}

///////////////////////////////////////////////
// init
///////////////////////////////////////////////
function InitCanvas(){
    var w = document.getElementById('nav').offsetWidth;
    var h = document.getElementById('top-welcome_screen').offsetHeight + document.getElementById('nav').offsetHeight; //top-welcome_screen
    canvas = createCanvas(w, h);
    canvas.parent("sketch-holder"); //insert this sketch where 'sketch-holder' is located
}

function Init(){
    for(var i=0; i<B_NUM; i++){
        b[i] = new Bubble(new Vec2(random(width*0.2, width*0.8), random(height*0.2, height*0.9)));
    }

    oct = new Octopath(new Vec2(width*0.5 - this.img.width*0.5, height*0.25), img);
}

///////////////////////////////////////////////
// Update
///////////////////////////////////////////////
function Update(){
    for(var i=0; i<B_NUM; i++){
        b[i].Update();
    }

    oct.Update();
}

///////////////////////////////////////////////
// Draw
///////////////////////////////////////////////
function Draw(){
    //flip screen
    background(BG_COLOR['r'], BG_COLOR['g'], BG_COLOR['b']);

    //main
    for(var i=0; i<B_NUM; i++){
        b[i].Draw();
    }

    oct.Draw();
}

///////////////////////////////////////////////
// Classes
///////////////////////////////////////////////
//param: Vec2 (float, float)
function Vec2(x, y){
    this.x = x;
    this.y = y;
}

//param: position (Vec2), size (float)
function DrawEllipse(position, size){
    ellipse(position.x, position.y, size, size);
}

function GetLimited(val, min, max){
    if(val < min){
        val = min;
    }
    else if(val > max){
        val = max;
    }
    
    return val;
}

class Octopath {
    constructor(position, img){
        this.position = position;
        this.img = img;
        this.color = color(O_COLOR['r'], O_COLOR['g'], O_COLOR['b']);
    }

    Update(){
        this.position = new Vec2(width*0.5 - this.img.width*0.5, height*0.25);
    }

    Draw(){
        tint(this.color);
        image(this.img, this.position.x, this.position.y, this.img.width*1, this.img.height*1);
    }
}

class Bubble {
    //param: position (Vec2)
    constructor(position){
        this.Init(position);
    }

    Init(position){
        this.position = position;
        this.size = random(B_SIZE['min'], B_SIZE['max']);
        this.speed = B_SPD * this.size; //vary the speed depending on the size
        this.color = color(
            GetLimited(B_COLOR['r'] - C_INV_VAL/(this.speed), 0, 255),
            GetLimited(B_COLOR['g'] - C_INV_VAL/(this.speed), 0, 255),
            GetLimited(B_COLOR['b'] - C_INV_VAL/(this.speed), 0, 255)
        );
        // console.log(red(this.color)+", "+green(this.color)+", "+blue(this.color));
    }

    get Position(){
        return this.position;
    }

    Update(){
        var tmp = this.position;

        tmp.y -= this.speed;

        if(tmp.y+this.size*0.5 < 0){ //if out of screen
            this.Init(new Vec2(random(width*0.2, width*0.8), height)); //init
            this.position.y += this.size*0.5; //adjust y to the very bottom of the screen
            return;
        }

        this.position = tmp;
    }

    Draw(){
        stroke(this.color);
        fill(this.color);
        DrawEllipse(this.position, this.size);
    }
}

///////////////////////////////////////////////
// Others
///////////////////////////////////////////////
//adjust canvas size when window resized
window.onresize = function() {
    var w = document.getElementById('nav').offsetWidth;
    var h = document.getElementById('top-welcome_screen').offsetHeight + document.getElementById('nav').offsetHeight;  
    resizeCanvas(w,h);
    width = w;
    height = h;
};
