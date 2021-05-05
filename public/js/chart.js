    var barChartLocData = {  
            labels: ["January", "Feburary", "March"],  
            datasets: [{ fillColor: "lightblue", strokeColor: "blue", data: [15, 20, 35] }]  
        };  
        var mybarChartLoc = new Chart(document.getElementById("barChartLoc").getContext("2d")).Bar(barChartLocData); 