# Test task for job interview

## Task
1. Сделать поток из 10000 событий вида {"device": "rnd(1-2)", "doc_num": "rnd(1-10)"}
2. События направляются в rabbitmq
3. Воркер разгребает из rabbit и кладет в базу mongo. При сохранении нужно решить задачу удаления дублей по doc_num с каждого устройства.


## to run

### Fists step:
In terminal
```bash
docker-compose up -d
```

### Second step:
Connect to php container
```bash
docker exec -ti [php-container-name] bash
```

In container
```bash
php console/generate-tasks.php
```


### Third step:
Connect to php container
```bash
docker exec -ti [php-container-name] bash
```

In container
```bash
php console/worker.php
```