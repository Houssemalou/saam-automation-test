var xhttp= new XMLHttpRequest();
xhttp.onreadystatechange=Action;
xhttp.open("GET", '/data.json');
xhttp.send();
let years=[];
let nb_tickets=[];
function Action(){
    if(this.readyState==4 && this.status==200){
        var data= JSON.parse(this.response);
        data.forEach(element => {
            years.push(element.year);
            nb_tickets.push(nombre_tickets);
            console.log(years);
            console.log(nb_tickets); 
            
        });
    }
}
  
