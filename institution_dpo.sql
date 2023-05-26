-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2023 г., 16:00
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `institution_dpo`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_discipline` (IN `p_name_discipline` VARCHAR(100), IN `p_ID_ep` INT, IN `p_amount_hour` INT, IN `p_amount_hour_work` INT, IN `p_type_practice` VARCHAR(20), IN `p_amount_hour_practice` INT, IN `p_type_mid_cert` VARCHAR(5))  BEGIN
    	INSERT INTO discipline(name_discipline, ID_ep, amount_hour, amount_hour_work, type_practice, amount_hour_practice, type_mid_cert)
        VALUES (p_name_discipline, p_ID_ep, p_amount_hour, p_amount_hour_work, p_type_practice, p_amount_hour_practice, p_type_mid_cert);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_program` (IN `p_name_ep` VARCHAR(255), IN `p_ID_focus` INT, IN `p_ID_type_ep` INT, IN `p_ID_form` INT, IN `p_time_week` INT, IN `p_amount_hour` INT, IN `p_ID_type_doc` INT, IN `p_type_cert` VARCHAR(20), IN `p_name_profession` VARCHAR(100), IN `p_count_in_group` INT)  INSERT INTO edu_program(name_ep, name_profession, type_cert, ID_type_ep, ID_focus, ID_type_doc, ID_form, time_week, amount_hour, count_in_group) VALUES (p_name_ep, p_name_profession, p_type_cert, p_ID_type_ep, p_ID_focus, p_ID_type_doc, p_ID_form, p_time_week, p_amount_hour, p_count_in_group)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upd_discipline` (IN `p_ID_discipline` INT, IN `p_name_discipline` VARCHAR(100), IN `p_ID_ep` INT, IN `p_amount_hour` INT, IN `p_amount_hour_work` INT, IN `p_type_practice` VARCHAR(20), IN `p_amount_hour_practice` INT, IN `p_type_mid_cert` VARCHAR(5))  BEGIN
    UPDATE discipline
    SET name_discipline = p_name_discipline,
        amount_hour = p_amount_hour,
        amount_hour_work = p_amount_hour_work,
        type_practice = p_type_practice,
        amount_hour_practice = p_amount_hour_practice,
        type_mid_cert = p_type_mid_cert
    WHERE ID_discipline = p_ID_discipline;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `attestation`
--

CREATE TABLE `attestation` (
  `ID_attestation` int(11) NOT NULL,
  `ID_load` int(11) NOT NULL,
  `ID_student` int(11) NOT NULL,
  `score` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `ID_course` int(11) NOT NULL,
  `name_course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_ep` int(11) NOT NULL,
  `date_start_teaching` date NOT NULL,
  `date_end_teaching` date NOT NULL,
  `status_course` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_decree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `ID_discipline` int(11) NOT NULL,
  `name_discipline` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_ep` int(11) NOT NULL,
  `amount_hour` int(11) NOT NULL,
  `amount_hour_work` int(11) NOT NULL,
  `type_practice` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_hour_practice` int(11) DEFAULT NULL,
  `type_mid_cert` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`ID_discipline`, `name_discipline`, `ID_ep`, `amount_hour`, `amount_hour_work`, `type_practice`, `amount_hour_practice`, `type_mid_cert`) VALUES
(1, 'Общепрофессиональные дисциплины', 1, 78, 0, NULL, NULL, 'З'),
(2, 'Специальные дисциплины', 1, 172, 0, NULL, NULL, 'З'),
(3, 'Итоговая аттестация', 1, 6, 6, NULL, NULL, 'З'),
(4, 'Нормативно-правовые основы экологической безопасности в строительстве', 2, 8, 0, NULL, NULL, 'З'),
(5, 'Экологические требования к разработке проектов строительства предприятий, зданий и сооружений', 2, 10, 0, NULL, NULL, 'З'),
(6, 'Обеспечение экологической безопасности в строительстве', 2, 52, 0, NULL, NULL, 'З'),
(7, 'Итоговая аттестация', 2, 2, 2, NULL, NULL, '3'),
(8, 'Модуль 1. Нормативно-правовые основы проектирования', 3, 6, 0, NULL, NULL, 'З'),
(9, 'Модуль 2. Требования к выполнению проектных работ, влияющих на безопасность объектов строительства', 3, 8, 0, NULL, NULL, 'З'),
(10, 'Модуль 3. Технологии проектирования', 3, 8, 0, NULL, NULL, 'З'),
(11, 'Модуль 4. Организационные мероприятия, обеспечивающие качество выполнения работ', 3, 10, 0, NULL, NULL, 'З'),
(12, 'Модуль 5. Особенности проектирования', 3, 38, 0, NULL, NULL, 'З'),
(13, 'Итоговая аттестация по учебному курсу', 3, 2, 2, NULL, NULL, 'З'),
(14, 'Общепрофессиональные дисциплины', 4, 60, 0, NULL, NULL, 'З'),
(15, 'Специальные дисциплины', 4, 190, 0, NULL, NULL, 'З'),
(16, 'Итоговая аттестация', 4, 6, 6, NULL, NULL, 'З'),
(17, 'Нормативно-правовые основы деятельности в сфере физической культуры и спорта', 5, 22, 0, NULL, NULL, 'З'),
(18, 'Государственная политика в сфере физической культуры и спорта', 5, 22, 0, NULL, NULL, 'З'),
(19, 'Педагогика и психология физической культуры', 5, 30, 0, NULL, NULL, 'З'),
(20, 'Гигиенические основы физической культуры и спорта. Личная гигиена. Рациональное питание', 5, 24, 0, NULL, NULL, 'З'),
(21, 'Теория и методика физической культуры', 5, 26, 0, NULL, NULL, 'З'),
(22, 'Цель, задачи, средства, методы и основные принципы спортивной подготовки', 5, 26, 0, NULL, NULL, 'З'),
(23, 'Биомеханика движения', 5, 26, 0, NULL, NULL, 'З'),
(24, 'Менеджмент и экономика физической культуры и спорта', 5, 24, 0, NULL, NULL, 'З'),
(25, 'Основы адаптивной физической культуры', 5, 26, 0, NULL, NULL, 'З'),
(26, 'Оказание первой помощи пострадавшим', 5, 24, 0, NULL, NULL, 'З'),
(27, 'Итоговая аттестация', 5, 6, 6, NULL, NULL, 'З'),
(28, '123', 7, 123, 123, NULL, NULL, '123'),
(29, '33333', 7, 333, 33, NULL, NULL, '333'),
(30, '33333333333', 7, 333, 333, NULL, NULL, '333'),
(31, '123', 7, 123, 123, NULL, NULL, '123'),
(32, '123', 7, 123, 123, NULL, NULL, '123'),
(33, '123222', 7, 123111, 12311, '3', 0, '12322');

-- --------------------------------------------------------

--
-- Структура таблицы `edu_program`
--

CREATE TABLE `edu_program` (
  `ID_ep` int(11) NOT NULL,
  `name_ep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_focus` int(11) NOT NULL,
  `ID_type_ep` int(11) NOT NULL,
  `ID_form` int(11) NOT NULL,
  `time_week` int(11) NOT NULL,
  `amount_hour` int(11) NOT NULL,
  `ID_type_doc` int(11) NOT NULL,
  `type_cert` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_profession` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_in_group` int(11) NOT NULL,
  `cost_hour` decimal(7,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `edu_program`
--

INSERT INTO `edu_program` (`ID_ep`, `name_ep`, `ID_focus`, `ID_type_ep`, `ID_form`, `time_week`, `amount_hour`, `ID_type_doc`, `type_cert`, `name_profession`, `count_in_group`, `cost_hour`, `price`) VALUES
(1, 'Промышленное и гражданское строительство', 1, 2, 1, 32, 256, 2, 'Зачет', 'Промышленное и гражданское строительство', 20, '0.00', '0.00'),
(2, 'Экологическая безопасность при строительстве зданий и сооружений', 2, 1, 1, 4, 72, 1, 'Зачет', 'Экологическая безопасность при строительстве зданий и сооружений', 20, '0.00', '0.00'),
(3, 'Схемы планировочной организации земельного участка', 3, 1, 1, 32, 72, 1, 'Зачет', 'Проектировщик', 15, '0.00', '0.00'),
(4, 'Делопроизводство и документооборот', 4, 2, 1, 32, 256, 2, 'Зачет', 'Делопроизводство и документооборот', 10, '0.00', '0.00'),
(5, 'Физическая культура и спорт', 5, 2, 1, 32, 256, 2, 'Зачет', 'Тренер', 15, '0.00', '0.00'),
(6, 'Делопроизводств', 1, 1, 1, 34, 300, 1, 'экзамен', 'секркетарь', 10, '0.00', '0.00'),
(7, 'Язык PHP', 6, 1, 1, 6, 144, 1, 'Экзамен', 'Программист', 10, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Структура таблицы `focus`
--

CREATE TABLE `focus` (
  `ID_focus` int(11) NOT NULL,
  `name_focus` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `focus`
--

INSERT INTO `focus` (`ID_focus`, `name_focus`) VALUES
(1, 'Строительство'),
(2, 'Экология'),
(3, 'Проектирование'),
(4, 'Администрирование'),
(5, 'Физкультура и спорт'),
(6, 'Информационные системы и технологии');

-- --------------------------------------------------------

--
-- Структура таблицы `form_teach`
--

CREATE TABLE `form_teach` (
  `ID_form` int(11) NOT NULL,
  `name_form` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `form_teach`
--

INSERT INTO `form_teach` (`ID_form`, `name_form`) VALUES
(1, 'Очная'),
(2, 'Заочная'),
(3, 'ДОТ');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `ID_role` int(11) NOT NULL,
  `name_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`ID_role`, `name_role`) VALUES
(1, 'Директор'),
(2, 'Методист'),
(3, 'Менеджер'),
(4, 'Клиент'),
(5, 'Преподаватель'),
(6, 'Бухгалтер');

-- --------------------------------------------------------

--
-- Структура таблицы `spending`
--

CREATE TABLE `spending` (
  `ID_item` int(11) NOT NULL,
  `name_item` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calculated_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statement`
--

CREATE TABLE `statement` (
  `ID_application` int(11) NOT NULL,
  `date_contract` date DEFAULT NULL,
  `ID_course` int(11) NOT NULL,
  `ID_student` int(11) NOT NULL,
  `status_application` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_payment` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `number_contract` int(11) DEFAULT NULL,
  `status_doc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series_doc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_give` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `type_doc`
--

CREATE TABLE `type_doc` (
  `ID_type_doc` int(11) NOT NULL,
  `name_type_doc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_doc`
--

INSERT INTO `type_doc` (`ID_type_doc`, `name_type_doc`) VALUES
(1, 'Удостоверение о повышении квалификации'),
(2, 'Диплом о профессиональной переподготовке'),
(3, 'Сертификат');

-- --------------------------------------------------------

--
-- Структура таблицы `type_ep`
--

CREATE TABLE `type_ep` (
  `ID_type_ep` int(11) NOT NULL,
  `name_type_ep` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_ep`
--

INSERT INTO `type_ep` (`ID_type_ep`, `name_type_ep`) VALUES
(1, 'Повышение квалификации'),
(2, 'Профессиональная переподготовка'),
(3, 'Стажировка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_role` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwords` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_exp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_user`, `full_name`, `ID_role`, `login`, `passwords`, `profession`, `education`, `work_exp`, `address`, `phone`, `email`) VALUES
(1, 'Кузков И В', 1, '111', '111', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(2, 'Вамиров И В', 2, '222', '222', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(3, 'Пручковский И В', 3, '333', '333', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(4, 'Харламов И В', 4, '444', '444', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(5, 'Большков И В', 5, '555', '555', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(6, 'Кузнецов И В', 6, '666', '666', '', '', '', '', '89996663322', 'rrrt@mswil.ru'),
(9, 'Путин А В', 4, '123', '123', NULL, NULL, NULL, NULL, '8966699', 'ilyakh_usa@mail.ru'),
(10, 'Путин А В', 4, '123', '123', NULL, NULL, NULL, NULL, '8966699', 'ilyakh_usa@mail.ru'),
(11, 'Путин А В', 4, '123', '123', NULL, NULL, NULL, NULL, '8966699', 'ilyakh_usa@mail.ru'),
(12, 'Мокова И А', 4, '147', '147', NULL, NULL, NULL, NULL, '8966699', 'ilyakh_usa@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `workload`
--

CREATE TABLE `workload` (
  `ID_load` int(11) NOT NULL,
  `ID_teacher` int(11) NOT NULL,
  `ID_course` int(11) NOT NULL,
  `ID_discipline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`ID_attestation`),
  ADD KEY `ID_load` (`ID_load`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID_course`),
  ADD KEY `ID_ep` (`ID_ep`);

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`ID_discipline`),
  ADD KEY `ID_ep` (`ID_ep`);

--
-- Индексы таблицы `edu_program`
--
ALTER TABLE `edu_program`
  ADD PRIMARY KEY (`ID_ep`),
  ADD KEY `ID_focus` (`ID_focus`),
  ADD KEY `ID_type_ep` (`ID_type_ep`),
  ADD KEY `ID_form` (`ID_form`),
  ADD KEY `ID_type_doc` (`ID_type_doc`);

--
-- Индексы таблицы `focus`
--
ALTER TABLE `focus`
  ADD PRIMARY KEY (`ID_focus`);

--
-- Индексы таблицы `form_teach`
--
ALTER TABLE `form_teach`
  ADD PRIMARY KEY (`ID_form`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_role`);

--
-- Индексы таблицы `spending`
--
ALTER TABLE `spending`
  ADD PRIMARY KEY (`ID_item`);

--
-- Индексы таблицы `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`ID_application`),
  ADD KEY `ID_course` (`ID_course`),
  ADD KEY `ID_student` (`ID_student`);

--
-- Индексы таблицы `type_doc`
--
ALTER TABLE `type_doc`
  ADD PRIMARY KEY (`ID_type_doc`);

--
-- Индексы таблицы `type_ep`
--
ALTER TABLE `type_ep`
  ADD PRIMARY KEY (`ID_type_ep`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `ID_role` (`ID_role`);

--
-- Индексы таблицы `workload`
--
ALTER TABLE `workload`
  ADD PRIMARY KEY (`ID_load`),
  ADD KEY `ID_teacher` (`ID_teacher`),
  ADD KEY `ID_course` (`ID_course`),
  ADD KEY `ID_discipline` (`ID_discipline`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attestation`
--
ALTER TABLE `attestation`
  MODIFY `ID_attestation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `ID_course` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `ID_discipline` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `edu_program`
--
ALTER TABLE `edu_program`
  MODIFY `ID_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `focus`
--
ALTER TABLE `focus`
  MODIFY `ID_focus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `form_teach`
--
ALTER TABLE `form_teach`
  MODIFY `ID_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `ID_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `spending`
--
ALTER TABLE `spending`
  MODIFY `ID_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statement`
--
ALTER TABLE `statement`
  MODIFY `ID_application` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_doc`
--
ALTER TABLE `type_doc`
  MODIFY `ID_type_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type_ep`
--
ALTER TABLE `type_ep`
  MODIFY `ID_type_ep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `workload`
--
ALTER TABLE `workload`
  MODIFY `ID_load` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `attestation`
--
ALTER TABLE `attestation`
  ADD CONSTRAINT `attestation_ibfk_1` FOREIGN KEY (`ID_load`) REFERENCES `workload` (`ID_load`),
  ADD CONSTRAINT `attestation_ibfk_2` FOREIGN KEY (`ID_student`) REFERENCES `users` (`ID_user`);

--
-- Ограничения внешнего ключа таблицы `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`ID_ep`) REFERENCES `edu_program` (`ID_ep`);

--
-- Ограничения внешнего ключа таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD CONSTRAINT `discipline_ibfk_1` FOREIGN KEY (`ID_ep`) REFERENCES `edu_program` (`ID_ep`);

--
-- Ограничения внешнего ключа таблицы `edu_program`
--
ALTER TABLE `edu_program`
  ADD CONSTRAINT `edu_program_ibfk_1` FOREIGN KEY (`ID_focus`) REFERENCES `focus` (`ID_focus`),
  ADD CONSTRAINT `edu_program_ibfk_2` FOREIGN KEY (`ID_type_ep`) REFERENCES `type_ep` (`ID_type_ep`),
  ADD CONSTRAINT `edu_program_ibfk_3` FOREIGN KEY (`ID_form`) REFERENCES `form_teach` (`ID_form`),
  ADD CONSTRAINT `edu_program_ibfk_4` FOREIGN KEY (`ID_type_doc`) REFERENCES `type_doc` (`ID_type_doc`);

--
-- Ограничения внешнего ключа таблицы `statement`
--
ALTER TABLE `statement`
  ADD CONSTRAINT `statement_ibfk_1` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`),
  ADD CONSTRAINT `statement_ibfk_2` FOREIGN KEY (`ID_student`) REFERENCES `users` (`ID_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_role`) REFERENCES `role` (`ID_role`);

--
-- Ограничения внешнего ключа таблицы `workload`
--
ALTER TABLE `workload`
  ADD CONSTRAINT `workload_ibfk_1` FOREIGN KEY (`ID_teacher`) REFERENCES `users` (`ID_user`),
  ADD CONSTRAINT `workload_ibfk_2` FOREIGN KEY (`ID_course`) REFERENCES `course` (`ID_course`),
  ADD CONSTRAINT `workload_ibfk_3` FOREIGN KEY (`ID_discipline`) REFERENCES `discipline` (`ID_discipline`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
