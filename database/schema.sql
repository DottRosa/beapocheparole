CREATE TABLE USERS(
    id SERIAL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    permission ENUM('USER', 'ADMIN'),

    PRIMARY KEY (id),
    KEY username (username),
    KEY permission (permission)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE GALLERY(
    id SERIAL,
    name VARCHAR(255) NOT NULL,
    thumb VARCHAR(255) DEFAULT NULL,
    position INT(11) NOT NULL DEFAULT 1,
    status ENUM('PUBLIC', 'PRIVATE') NOT NULL DEFAULT 'PRIVATE',
    creation_date DATETIME NOT NULL,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY name (name),
    KEY position (position),
    KEY status (status)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE R_MEDIA(
    name VARCHAR(255) NOT NULL,
    gallery_id BIGINT(20) UNSIGNED NOT NULL,
    media_id BIGINT(20) UNSIGNED NOT NULL,
    type ENUM('IMG', 'TXT') NOT NULL,
    position INT(11) NOT NULL DEFAULT 1,

    PRIMARY KEY(gallery_id, media_id, type), /* Teniamola con le briglie amore (cit. Ele) */
    KEY gallery_id (gallery_id),
    KEY media_id (media_id),
    KEY type (type),
    KEY position (position),

    CONSTRAINT R_MEDIA_gallery_id FOREIGN KEY (gallery_id) REFERENCES GALLERY (id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE IMAGES(
    id SERIAL,
    asset VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    creation_date DATETIME NOT NULL,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY title (title)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;






CREATE TABLE DOCUMENTS(
    id SERIAL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    creation_date DATETIME NOT NULL,
    update_date DATETIME DEFAULT NULL,
    delete_data DATETIME DEFAULT NULL,

    PRIMARY KEY(id),
    KEY title (title)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE LOGS(
    id SERIAL,
    action VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    user_id BIGINT(20) UNSIGNED NOT NULL,
    creation_date DATETIME NOT NULL,

    PRIMARY KEY(id),
    KEY user_id (user_id),

    CONSTRAINT LOGS_user FOREIGN KEY (user_id) REFERENCES USERS (id) ON UPDATE CASCADE ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
