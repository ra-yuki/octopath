var interval;
var cycleTextElement;
var t;
var cycleHead, cycleTexts, cycleInterval;

// Inside Functions
function Init(){
    interval = setInterval(onTick, 1000);
    cycleTextElement = document.getElementById("cycle-text");
    t = 0;
    cycleHead = 0;
    cycleInterval = 200;
    cycleTexts = [
        'Hobbies',
        'Recipes',
        'Travel Plans'
    ];
}

function Update(){
    t++;
    if(t % cycleInterval == 0){
        cycleHead++;
    }
}

function Draw(){
    cycleTextElement.innerHTML = cycleTexts[cycleHead % cycleTexts.length];
}

// Init
Init();
// Main Loop
function onTick(){
    Update();
    Draw();
}
