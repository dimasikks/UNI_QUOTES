FROM postgres:15

ENV POSTGRES_USER=postgres
ENV POSTGRES_PASSWORD=postgres321

COPY init.sql /docker-entrypoint-initdb.d/

CMD ["postgres"]
