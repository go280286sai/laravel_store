# Указываем базовый образ
FROM python:3.10-alpine

# Устанавливаем переменные окружения
ENV PYTHONDONTWRITEBYTECODE 1
ENV PYTHONUNBUFFERED 1

# Устанавливаем рабочую директорию внутри контейнера
WORKDIR /app

# Копируем зависимости в контейнер
COPY requirements.txt /app/

# Устанавливаем зависимости
RUN pip install --no-cache-dir -r requirements.txt

# Копируем остальные файлы в контейнер
COPY . /app/

# Указываем команду, которая будет выполняться при запуске контейнера
CMD ["uvicorn", "main:app", "--host", "0.0.0.0", "--port", "8000"]