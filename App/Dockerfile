FROM python:3.9

RUN pip install psycopg2

WORKDIR /app

COPY . .

CMD ["python3","load_images.py"]
