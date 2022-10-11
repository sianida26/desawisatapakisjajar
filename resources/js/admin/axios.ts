import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: '/api',
    // baseURL: 'http://localhost:8000/api',
    timeout: 20000,  
    headers: {
        Accept: "application/json",
    },
});

export default axiosInstance;