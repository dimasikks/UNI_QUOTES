import os
import psycopg2
import time

def save_image_to_db(image_path, image_name):
    image_name, extension = os.path.splitext(image_name)
    conn = None
    while True:
           try:
               conn = psycopg2.connect(
                   user="postgres",
                   password="postgres321",
                   port="5432",
                   host="10.10.10.10",
                   database="uni_quote"
               )
               cursor = conn.cursor()
               cursor.execute("INSERT INTO author_image (image_path, author) VALUES (%s, %s)", (image_path, image_name))
               conn.commit()
               cursor.close()
               conn.close()
               break
           except psycopg2.OperationalError:
               print("Waiting for database to be ready...")
               time.sleep(10)

def upload_images_from_directory(directory):
    for filename in os.listdir(directory):
        if filename.endswith(('.jpg')):
            image_path = os.path.join(directory, filename)
            save_image_to_db(image_path, filename)

directory_to_upload = 'Storage/IMAGES/'
upload_images_from_directory(directory_to_upload)
print("Successful!")
