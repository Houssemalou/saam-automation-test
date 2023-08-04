var xhttp= new XMLHttpRequest();
xhttp.onreadystatechange=Action;
xhttp.open("GET", '/tests/total/data.json');
xhttp.send();
var months=[];
var months_fr=[];
var month_nb_tickets=[];
function Action(){
    if(this.readyState==4 && this.status==200){
        var data= JSON.parse(this.response);
        console.log(data);
        months.push(data[0]);
        month_nb_tickets=data[1];
        
       
    }
}
console.log(months);

function getMonthName(monthIndex) {
    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    if (monthIndex >= 0 && monthIndex < months.length) {
        return months[monthIndex];
    } else {
        return 'Invalid month index';
    }
}
months.forEach(element => {
    months_fr.push(getMonthName(parseInt(element)))
});


    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: [ "2020", "2021", "2022", "2023"] ,
            datasets: [{
                    label: "Compelted Ticket",
                    data: [125,174 , 212,274],
                    backgroundColor: "rgba(235, 22, 22, .7)"
                },
                {
                    label: "Rejected Ticket",
                    data: [18, 35, 25, 24],
                    backgroundColor: "rgba(235, 22, 22, .5)"
                },
                {
                    label: "Ticket In Progress",
                    data: [54, 35, 45, 74],
                    backgroundColor: "rgba(235, 22, 22, .3)"
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    // Salse & Revenue Chart
    var ctx2 = $("#salse-revenue").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: [ "2020", "2021", "2022", "2023"],
            datasets: [{
                    label: "Compelet Ticket",
                    data:  [ 130, 190, 180, 270],
                    backgroundColor: "rgba(235, 22, 22, .7)",
                    fill: true
                },
                {
                    label: "Rejected Ticket",
                    data: [ 45, 70, 65, 85],
                    backgroundColor: "rgba(235, 22, 22, .5)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });