var xhttp= new XMLHttpRequest();
xhttp.onreadystatechange=Action;
xhttp.open("GET", '/data.json');
xhttp.send();
var months=[];
var months_fr=[];
var com_tickets=[];
var rej_tickets=[];
var pro_tickets=[];
function Action(){
    if(this.readyState==4 && this.status==200){
        var data= JSON.parse(this.response);
        months=data[0];
        com_tickets=data[1];
        rej_tickets=data[2];
        pro_tickets=data[3];
    }
}
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
console.log(months_fr);

    // Worldwide Sales Chart
    var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: [ "2020", "2021", "2022", "2023"] ,
            datasets: [{
                    label: "Completed Ticket",
                    data: [115, 130, 155, 204],
                    backgroundColor: "rgba(235, 22, 22, .7)"
                },
                {
                    label: "Rejected Ticket",
                    data: [28, 35, 25, 42],
                    backgroundColor: "rgba(235, 22, 22, .5)"
                },
                {
                    label: "Ticket In Pro",
                    data: [12, 25, 45, 18],
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
            labels: [ "2019", "2020", "2021", "2022", "2023"],
            datasets: [{
                    label: "Completed Ticket",
                    data: [ 135, 170, 130, 190, 180, 270],
                    backgroundColor: "rgba(235, 22, 22, .7)",
                    fill: true
                },
                {
                    label: "Rejected Ticket",
                    data:  [30, 55, 45, 70, 65, 85],
                    backgroundColor: "rgba(235, 22, 22, .5)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });