<div class="review-graph">
    <h4>Primary Usage</h4>
    <div class="review-graph__content">
        <canvas id="primaryUsagePieChart" width="100" height="150"></canvas>

        <div class="review-graph__legends">
            <ul id="primaryUsageLegends"></ul>
        </div>
    </div>


</div>

<script>
    var data = [{
            name: 'Personal Use',
            color: '#013068',
            value: 61
        }, {
            name: 'Events',
            color: '#726A95',
            value: 8,
        },
        {
            name: 'Team',
            color: '#FF9292',
            value: 3,
        },
        {
            name: 'School',
            color: '#FFDCDC',
            value: 9,
        },
        {
            name: 'Uniform',
            color: 'red',
            value: 4,
        }, {
            name: 'Others',
            color: '#98DED9',
            value: 4,
        }
    ]

    var primaryUsagePieChart = document.getElementById('primaryUsagePieChart');
    var primaryUsageLegends = $('#primaryUsageLegends');

    data.forEach(function(item) {
        primaryUsageLegends.append(`
            <li>
                <span class="color" style="background-color: ${item.color};"></span>
                <div class="percent">${item.value}%</div>
                <span class="text">${item.name}</span>
            </li>
        `)
    })

    new Chart(primaryUsagePieChart, {
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
            plugins: {
                // responsive: true,
                labels: false,
                tooltips: false,
                title: {
                    display: false,
                },
                legend: false,
            },

        }
    });
</script>