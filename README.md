# Test task for job interview

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