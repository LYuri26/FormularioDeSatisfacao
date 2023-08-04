new Chart(document.getElementById("availability-of-books-canvas"), {
    type: 'bar',
    data: {
        labels: ["Muito Satisfeito", "Satisfeito", "Neutro", "Insatisfeito", "Muito Insatisfeito"],
        datasets: [{
            label: 'Disponibilidade de Livros',
            data: [/* Your data values here */],
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 5,
                stepSize: 1
            }
        }
    }
});

// Create a constant for the closing </td> tag
const TD_CLOSE_TAG = "</td>";

// Define the rating labels
const ratingLabels = [
    "Muito Insatisfeito",
    "Insatisfeito",
    "Neutro",
    "Satisfeito",
    "Muito Satisfeito"
];

// Define the colors for each rating level
const ratingColors = [
    "#FF4136", // Muito Insatisfeito (Vermelho)
    "#FF851B", // Insatisfeito (Laranja)
    "#FFDC00", // Neutro (Amarelo)
    "#0074D9", // Satisfeito (Azul)
    "#2ECC40"  // Muito Satisfeito (Verde)
];

// Create a function to create a chart
function createChart(id, data, columnName) {
    // Create a new chart object
    new Chart(document.getElementById(id).firstElementChild, {
        type: "bar",
        data: {
            labels: ratingLabels,
            datasets: [{
                label: columnName,
                data: data,
                backgroundColor: ratingColors
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5,
                    stepSize: 1,
                    title: {
                        display: true,
                        text: "Quantidade"
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: "Avaliação"
                    }
                }
            }
        }
    });
}

// Create a function to process the data and create the charts
function processAndCreateCharts() {
    const tabela = document.querySelector('.formulario-table');
    const rows = tabela.getElementsByTagName('tr');
    const data = {
        availability_of_books: [0, 0, 0, 0, 0],
        study_environment: [0, 0, 0, 0, 0],
        staff_service: [0, 0, 0, 0, 0],
        material_organization: [0, 0, 0, 0, 0],
        welcoming_place_for_studies: [0, 0, 0, 0, 0],
        internet_access: [0, 0, 0, 0, 0],
        computer_availability: [0, 0, 0, 0, 0],
        variety_of_events_and_activities: [0, 0, 0, 0, 0],
        opening_hours: [0, 0, 0, 0, 0],
        space_availability: [0, 0, 0, 0, 0],
        general_satisfaction: [0, 0, 0, 0, 0]
    };

    // Loop through the rows (excluding the header row)
    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');

        // Loop through the cells (excluding the first, last, and two additional columns)
        for (let j = 1; j < cells.length - 1; j++) { // Exclude the last column
            const value = parseInt(cells[j].textContent);

            // Increment the corresponding value in the data object
            if (!isNaN(value) && value >= 1 && value <= 5) {
                data[Object.keys(data)[j - 1]][value - 1]++;
            }
        }
    }

    // Create a chart for each column
    createChart("availability-of-books-chart", data.availability_of_books, "Disponibilidade de Livros");
    createChart("study-environment-chart", data.study_environment, "Ambiente de Estudo");
    createChart("staff-service-chart", data.staff_service, "Atendimento dos Funcionários");
    createChart("material-organization-chart", data.material_organization, "Organização dos Materiais");
    createChart("welcoming-place-for-studies-chart", data.welcoming_place_for_studies, "Local Acolhedor para Estudos");
    createChart("internet-access-chart", data.internet_access, "Acesso à Internet");
    createChart("computer-availability-chart", data.computer_availability, "Disponibilidade de Computadores");
    createChart("variety-of-events-and-activities-chart", data.variety_of_events_and_activities, "Variedade de Eventos e Atividades");
    createChart("opening-hours-chart", data.opening_hours, "Horário de Funcionamento");
    createChart("space-availability-chart", data.space_availability, "Disponibilidade de Espaços");
    createChart("general-satisfaction-chart", data.general_satisfaction, "Satisfação Geral");
}

// Call the data processing and chart creation function
processAndCreateCharts();
