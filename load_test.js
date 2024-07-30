import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

export let options = {
    stages: [
        { duration: '1m', target: 100 }, // Разогрев, 100 пользователей в течение 1 минуты
        { duration: '5m', target: 1000 }, // Пиковая нагрузка, 1000 пользователей в течение 5 минут
        { duration: '2m', target: 0 },    // Спад, снижение до 0 пользователей за 2 минуты
    ],
    thresholds: {
        'http_req_duration': ['p(95)<500'], // 95% запросов должны быть выполнены за 500ms
        'http_req_failed': ['rate<0.01'],   // Процент неудачных запросов должен быть меньше 1%
    }
};

export default function () {
    let response = http.get('http://localhost/sergey1karpov');

    check(response, {
        'is status 200': (r) => r.status === 200,
        'response time < 500ms': (r) => r.timings.duration < 500,
    });

    sleep(1);
}

