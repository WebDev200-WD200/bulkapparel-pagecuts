<div class="review-graph">
    <h4>Customization</h4>
    <div class="review-graph__content">
        <canvas id="customizationPieChart" width="150" height="150"></canvas>
        <div class="review-graph__legends">
            <ul id="customizationLegends"></ul>
        </div>
    </div>


</div>


<script>
    var data = [{
            name: 'Heat transfer',
            color: '#013068',
            value: 61
        }, {
            name: 'Sublimation',
            color: '#726A95',
            value: 8,
        },
        {
            name: 'Keep it blank',
            color: '#FF9292',
            value: 3,
        },
        {
            name: 'Screen printing',
            color: '#FFDCDC',
            value: 9,
        },
        {
            name: 'Emboidery',
            color: 'red',
            value: 4,
        }, {
            name: 'Test',
            color: '#98DED9',
            value: 4,
        },
        {
            name: 'Other',
            color: '#98DED9',
            value: 1,
        }
    ]

    
    var customizationPieChart = document.getElementById('customizationPieChart');
    var customizationLegends = $('#customizationLegends')
    data.forEach(function(item) {
        customizationLegends.append(`
            <li>
                <span class="color" style="background-color: ${item.color};"></span>
                <div class="percent">${item.value}%</div>
                <span class="text">${item.name}</span>
            </li>
        `)
    })
    new Chart(customizationPieChart, {
        type: 'pie',
        data: {
            labels: data.map(function(item) {
                return item.name
            }),
            datasets: [{
                label: false,
                data: data.map(function(item) {
                    return item.value
                }),
                backgroundColor: data.map(function(item) {
                    return item.color
                }),
                hoverOffset: 4
            }]
        },
        options: {
            // maintainAspectRatio: false,
            // responsive: true,
            label: false,
            tooltips: false,
            plugins: {
                responsive: true,
                legend: false
            }
        }
    });
</script>