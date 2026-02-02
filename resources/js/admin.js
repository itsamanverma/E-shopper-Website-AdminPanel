import Alpine from 'alpinejs'
import axios from 'axios'
import { Chart, registerables } from 'chart.js'

// Register Chart.js components
Chart.register(...registerables)

// Configure axios
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

// Set CSRF token for all requests
let token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

// Alpine.js data for admin dashboard
Alpine.data('adminDashboard', () => ({
    sidebarOpen: false,
    
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen
    },
    
    // Chart data
    initChart(element, type = 'line', data = {}) {
        if (!element) return
        
        const ctx = element.getContext('2d')
        return new Chart(ctx, {
            type: type,
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })
    },
    
    // Sample analytics data
    getAnalyticsData() {
        return {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Sales',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4
            }]
        }
    },
    
    // Load dashboard stats
    async loadStats() {
        try {
            const response = await axios.get('/admin/api/stats')
            return response.data
        } catch (error) {
            console.error('Failed to load stats:', error)
            return {
                totalUsers: 0,
                totalOrders: 0,
                totalProducts: 0,
                totalRevenue: 0
            }
        }
    }
}))

// Start Alpine
Alpine.start()

// Make Alpine globally available
window.Alpine = Alpine