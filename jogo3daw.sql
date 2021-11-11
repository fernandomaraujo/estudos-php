SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `questionario` (
  `pergunta` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `valor` int(3) NOT NULL,
  `dificuldade` varchar(40) COLLATE latin1_general_ci NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Algumas cadastradas
INSERT INTO `questionario` (`pergunta`, `valor`, `dificuldade`) VALUES
('Qual a cor do cavalo branco do cavalheiro?', 10, 'facil'),
('Por que a galinha foi atravessar a rua?', 50, 'media');

-- Pergunta sendo a chave primária (dá tempo de colocar id?)
ALTER TABLE `questionario`
  ADD PRIMARY KEY (`pergunta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;