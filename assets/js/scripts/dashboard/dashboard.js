 $(document).ready(function() {

//     //#region 
//     $(document).on("click", "#logoutBtn", function (event) {
//         $.ajax({
//             url:window.site_url.concat("user/logout"),
//             method: "POST",
//             success: function(res) {
                
//             }
//         })
        
//     })
//     //#endregion 
    $(document).on("click", "#saveBtn", function(){
        Swal.fire({
            title: "Do you want to save it?",
            icon: "warning",
            showCancelButton:true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel:true,
        })
    });
    //chart label /////bar graph
    var ctx = document.getElementById("sampleChart1").getContext('2d');
    var sampleChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["C.Aurino", "K.Pambid", "M.Falcutila", "R.Gonito"],
            datasets: [{
                label: "Research & Development",
                data: [50, 80, 60, 95],
                backgroundColor: ["red", "blue", "green", "yellow"]
            }]
        },
        options:{
            plugins: {
                label: false
            },
            scales: {
                xAxes: [{
                    barPercentage: 0.6,
                    display: true
                }],
                yAxes:[{
                    display: true,
                    ticks:{
                        stepSize: 10,
                        min: 0,
                        max: 100
                    },
                    scaleLabel: {
                        display: true,
                        labelString: "Percentage %"
                    }
                }]                
            }
        }
    });
    //LINE GRAPH
    var ctx = document.getElementById("sampleChart2").getContext("2d");
    var sampleChart2 = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            datasets:[{
                label: 'Activity Score',
                data: [50, 50,70,90,80],
                borderColor: ["red"],
            },{
                label: 'Exam Score',
                data: [24, 64, 53, 26,64],
                borderColor: ["blue"],
            },{
                label: 'Quiz Score',
                data: [24, 20, 30, 26,21],
                borderColor: ["green"],
            }],        
        },
        options:{
            plugins:{
                label:false,
                datalabels:false
            }
        }
    });
    //PIE GRAPH
    var ctx = document.getElementById("sampleChart3").getContext("2d");
    var sampleChart3 = new Chart(ctx,{
        type: "pie",
        data:{
            labels:['Apple', 'Banana', 'Pineapple', 'Mango', 'Grapes'],
            datasets: [{
                label: "PAPIE", 
                data: [10, 40, 20, 10, 20],
                backgroundColor:['red', 'yellow', 'orange', 'green', 'violet'],
            }],
        }
    });
    //DONUT GRAPH
    var ctx = document.getElementById("sampleChart4").getContext("2d");
    var sampleChart4  = new Chart(ctx,{
        type: "doughnut",
        data:{
            labels:['Apple', 'Banana', 'Pineapple', 'Mango', 'Grapes'],
            datasets: [{
                label: 'PADONUT',
                data: [10, 40, 20, 10, 20],
                backgroundColor:['red', 'yellow', 'orange', 'green', 'violet'],
            }],     
        }
    });
    //
    //REALTIme chart
    // var ctx = document.getElementById("sampleChart5").getContext("2d");
    // var sampleChart5 = new Chart(ctx, {
    //     type: 'line',    
    //     data: {    
    //         labels:[],  
    //         dataset:[
    //             {
    //                 type: "line",
    //                 fill: false,
    //                 label: "Temperature",
    //                 data: new Array(),
    //                 backgroundColor: "#00b050",
    //                 borderColor: "#00b050",
    //                 yAxisID: "A",
    //                 borderDash: [0, 0],
    //             },
    //             {
    //                 type: "line", 
    //                 fill: false,
    //                 label: "Flowrate",
    //                 data: new Array(),
    //                 backgroundColor: "#00bcd4",
    //                 borderColor: "#00bcd4",
    //                 yAxisID: "B",
    //                 borderDash:[0,0],
    //             },
    //         ]
    //     },
    //     options: {
    //         scales: {
    //             xAxes:[
    //                 {
    //                     type: 'realtime',
    //                     realtime: {
    //                         duration: 20000,
    //                         ttl: 6000,
    //                         refresh: 1000,
    //                         delay: 200,
    //                         pause: false,
    //                         onRefresh: function (chart) {
    //                             chart.config.data.datasets[0].data.push({
    //                                 x: Date.now(),
    //                                 y: 29
    //                             })
    //                         }
    //                     }
    //                 }
    //             ],
    //             yAxes: [
    //                 {

    //                 }
    //             ]
    //         }
    //     }          
    // });
});
