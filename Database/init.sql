CREATE DATABASE uni_quote;

\c uni_quote;

CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS users_create (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    time_create TIMESTAMP NOT NULL,
    CONSTRAINT cur_user FOREIGN KEY (id) REFERENCES users(id),
    CONSTRAINT cur_username FOREIGN KEY (username) REFERENCES users(username)
);

CREATE OR REPLACE FUNCTION set_create()
RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO users_create (id, username, time_create)
    VALUES (NEW.id, NEW.username, NOW())
    ON CONFLICT (id) DO UPDATE 
    SET time_create = NOW(); 
    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER set_create_trigger
AFTER INSERT OR UPDATE ON users
FOR EACH ROW
EXECUTE FUNCTION set_create();

INSERT INTO users(username,email,pass) VALUES ('admin','admin@admin.su','admin321');

CREATE TABLE IF NOT EXISTS author_image (
    id SERIAL PRIMARY KEY,
    image_path TEXT,
    author VARCHAR(70) NOT NULL
);

CREATE TABLE IF NOT EXISTS quote_motivation (
    id SERIAL PRIMARY KEY,
    author VARCHAR(70) NOT NULL,
    quote TEXT UNIQUE,
    rate INT NOT NULL DEFAULT 0
);

INSERT INTO quote_motivation(author,quote) VALUES
    ('Марк Твен','Почувствуйте попутный ветер в вашем парусе. Двигайтесь вперёд, действуйте, открывайте!'),
    ('Димасик','Возможно, когда-нибудь я об этом пожалею, но это будет потом - потом и пожалеем'),
    ('Екатерина Прекрасная','Иди работай давай'),
    ('Винс Ломбарди', 'Победа — не главное, она — все.'),
    ('Конфуций', 'Путь в тысячу ли начинается с первого шага.'),
    ('Стив Джобс', 'Только те, кто безумен, чтобы думать, что могут изменить мир, действительно его меняют.'),
    ('Наполеон Хилл', 'Ваше большое желание — это полпути к успеху.'),
    ('Уинстон Черчилль', 'Успех — это способность идти от одной неудачи к другой, не теряя энтузиазма.')
ON CONFLICT (quote) DO NOTHING;

CREATE TABLE IF NOT EXISTS quote_life (
    id SERIAL PRIMARY KEY,
    author VARCHAR(70) NOT NULL,
    quote TEXT UNIQUE,
    rate INT NOT NULL DEFAULT 0
);

INSERT INTO quote_life(author,quote) VALUES
    ('Стив Джобс','Ваше время ограничено, так что не тратьте его, живя чужой жизнью.'),
    ('Джон Леннон', 'Жизнь — это то, что происходит, пока вы строите планы.'),
    ('Конфуций', 'Жизнь проста, но мы настойчиво ее усложняем.'),
    ('Оскар Уайльд', 'Живи так, как будто каждый день — последний. Однажды ты окажешься прав.'),
    ('Марк Аврелий', 'Жизнь похожа на игру в кости: важно не то, что выпало, а как это используется.'),
    ('Пауло Коэльо', 'Жизнь всегда ждёт подходящего момента для действия.'),
    ('Конфуций', 'Мы живем только один раз, но если правильно, то этого достаточно.'),
    ('Сократ', 'Не можешь изменить свою жизнь — измени своё отношение к ней.')  
ON CONFLICT (quote) DO NOTHING;

CREATE TABLE IF NOT EXISTS quote_love (
    id SERIAL PRIMARY KEY,
    author VARCHAR(70) NOT NULL,
    quote TEXT UNIQUE,
    rate INT NOT NULL DEFAULT 0
);

INSERT INTO quote_love(author,quote) VALUES
    ('Антуан де Сент-Экзюпери', 'Истинная любовь начинается там, где ничего не ждут взамен.'),
    ('Фридрих Ницше', 'Любовь к одному человеку — это варварство: так как она осуществляется за счет всех остальных. А также и в ущерб большинству.'),
    ('Лев Толстой', 'Любить — значит жить жизнью того, кого любишь.'),
    ('Антуан де Сент-Экзюпери', 'Истинная любовь начинается там, где ничего не ждут взамен.'),
    ('Фридрих Ницше', 'Любовь к одному человеку — это варварство: так как она осуществляется за счет всех остальных. А также и в ущерб большинству.'),
    ('Лев Толстой', 'Любить — значит жить жизнью того, кого любишь.'),
    ('Джон Леннон', 'Любовь — это обещание, это память, однажды данная и никогда не забытая.'),
    ('Эрих Мария Ремарк', 'Любовь не терпит объяснений. Ей нужны поступки.')
ON CONFLICT (quote) DO NOTHING;

CREATE TABLE IF NOT EXISTS quote_goal (
    id SERIAL PRIMARY KEY,
    author VARCHAR(70) NOT NULL,
    quote TEXT UNIQUE,
    rate INT NOT NULL DEFAULT 0
);

INSERT INTO quote_goal(author, quote) VALUES
    ('Брюс Ли', 'Будь тем, кто делает что-то, а не тем, кто только говорит.'),
    ('Наполеон Хилл', 'Цель — это мечта с конкретным сроком исполнения.'),
    ('Тони Роббинс', 'Успех — это результат постоянного стремления к достижению цели.'),
    ('Уинстон Черчилль', 'Поражение не окончательно, пока ты не сдался.'),
    ('Арнольд Шварценеггер', 'Не существует легких путей к успеху — есть только упорная работа.'),
    ('Эллен ДеДженерес', 'Стремись к успеху, но не забывай, что иногда его следует заслужить.'),
    ('Пабло Пикассо', 'Действие — ключ к успеху.'),
    ('Винс Ломбарди', 'Победа требует усилий, и путь к ней начинается с маленьких шагов.')
ON CONFLICT (quote) DO NOTHING;

CREATE TABLE IF NOT EXISTS quote_mean_life (
    id SERIAL PRIMARY KEY,
    author VARCHAR(70) NOT NULL,
    quote TEXT UNIQUE,
    rate INT NOT NULL DEFAULT 0
);

INSERT INTO quote_mean_life (author, quote) VALUES
    ('Виктор Франкл', 'Смысл жизни — это найти своё предназначение и посвятить себя его исполнению.'),
    ('Лев Толстой', 'Смысл жизни не в том, чтобы жить, а в том, чтобы найти то, ради чего стоит жить.'),
    ('Фридрих Ницше', 'Тот, кто имеет, ради чего жить, способен вынести почти любое "как".'),
    ('Платон', 'Значение жизни находится не в её длительности, а в её использовании.'),
    ('Маркус Аврелий', 'Человек состоит из трёх вещей: тела, духа и сознания. Заботься о каждом и смысл твоей жизни будет ясен.'),
    ('Эллен ДеДженерес', 'Смысл жизни не в том, чтобы быть лучше других, а в том, чтобы быть лучше себя.'),
    ('Мартин Лютер Кинг', 'Истинный смысл жизни — не в том, чтобы быть счастливым, а в том, чтобы оправдать своё существование.')
ON CONFLICT (quote) DO NOTHING;
