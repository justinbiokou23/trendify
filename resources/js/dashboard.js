import Chart from 'chart.js/auto';
document.addEventListener('DOMContentLoaded', function () {
  
const ctx1 = document.getElementById("chartVentes").getContext("2d");
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['LUN', 'MAR', 'MER', 'JEU', 'VEN', 'SAM', 'DIM'],
      datasets: [{
        label: 'Coût',
        data: [280, 290, 310, 330, 350, 370, 390],
        borderColor: '#3b82f6',
        tension: 0.4,
        fill: false
      }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
  });

  const ctx2 = document.getElementById("chartAnalyse").getContext("2d");
  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [
        {
          label: ' hors ligne',
          data: [20, 30, 60, 50, 60, 65, 70],
          borderColor: '#3b82f6',
          tension: 0.3
        },
        {
          label: ' en ligne',
          data: [15, 25, 50, 75, 70, 80, 60],
          borderColor: '#f97316',
          tension: 0.3
        }
      ]
    },
    options: { responsive: true }
  });

  const ctx3 = document.getElementById("chartRevenus").getContext("2d");
  new Chart(ctx3, {
    type: 'doughnut',
    data: {
      labels: ['Hors ligne', 'En ligne', 'Trade'],
      datasets: [{
        data: [50, 30, 20],
        backgroundColor: ['#10b981', '#f97316', '#3b82f6']
      }]
    },
    options: {
      responsive: true,
      cutout: '70%'
    }
  });
  // Ton code Chart.js ici (tout ce que tu as déjà, dans le bon ordre)
});

