//Java Script 
//Justin Kachornvanich 
//Dr. Briggs
//CS 385
//Java script for a live clock 

//Function to get the current time
function startTime() 
{
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
    setTimeout(startTime, 1000);
}

//Function that adds a zero in front of numbers less than 10 
function checkTime(i) 
{
    if (i < 10) 
    {
        i = "0" + i
    };  
    return i;
}