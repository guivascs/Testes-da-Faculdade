-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2019 às 00:58
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visaosystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `idcaixa` int(5) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `ativo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `ativo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatocli`
--

CREATE TABLE `contatocli` (
  `idcontatocli` int(5) NOT NULL,
  `idcliente` int(5) NOT NULL,
  `telefone1` varchar(15) NOT NULL,
  `telefone2` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatoestab`
--

CREATE TABLE `contatoestab` (
  `idcontatoestab` int(5) NOT NULL,
  `idestab` int(5) NOT NULL,
  `telefone1` varchar(15) NOT NULL,
  `telefone2` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatofornec`
--

CREATE TABLE `contatofornec` (
  `idcontatofornec` int(5) NOT NULL,
  `idfornec` int(5) NOT NULL,
  `telefone1` varchar(15) NOT NULL,
  `telefone2` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `idcupom` int(5) NOT NULL,
  `idcaixa` int(5) NOT NULL,
  `idfina` int(5) NOT NULL,
  `idestab` int(5) NOT NULL,
  `valortotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecocli`
--

CREATE TABLE `enderecocli` (
  `idenderecocli` int(5) NOT NULL,
  `idcliente` int(5) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `logradouro` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecoestab`
--

CREATE TABLE `enderecoestab` (
  `idenderecoestab` int(5) NOT NULL,
  `idestab` int(5) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `logradouro` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecofornec`
--

CREATE TABLE `enderecofornec` (
  `idenderecofornec` int(5) NOT NULL,
  `idfornec` int(5) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `logradouro` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `municipio` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `idestab` int(5) NOT NULL,
  `razaosocial` varchar(50) NOT NULL,
  `nomefantasia` varchar(50) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `tiporegime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalizadora`
--

CREATE TABLE `finalizadora` (
  `idfina` int(5) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `tipofina` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `finalizadora`
--

INSERT INTO `finalizadora` (`idfina`, `nome`, `tipofina`) VALUES
(7, 'Cartao Credito', 'Cartao de Credito'),
(8, 'Ticket', 'Outros'),
(9, 'Cartao  Debito', 'Cartao de Debito'),
(10, 'Dinheiro', 'Dinheiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idfornec` int(5) NOT NULL,
  `razaosocial` varchar(50) NOT NULL,
  `nomefantasia` varchar(30) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `ativo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcupom`
--

CREATE TABLE `itemcupom` (
  `codproduto` int(5) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `preco` int(6) NOT NULL,
  `valortotal` int(6) NOT NULL,
  `idcupom` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(5) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `valorprod` float NOT NULL,
  `pesavel` varchar(3) DEFAULT NULL,
  `enviapdv` varchar(3) NOT NULL,
  `foradelinha` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `descricao`, `valorprod`, `pesavel`, `enviapdv`, `foradelinha`) VALUES
(1, 'teste', 10, 'Nao', 'Sim', 'Nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(5) NOT NULL,
  `nomeusu` varchar(30) NOT NULL,
  `loginusu` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  `tipousu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nomeusu`, `loginusu`, `senha`, `ativo`, `tipousu`) VALUES
(1, 'Administrador', 'admin', 'admin', 'Sim', 0),
(20, 'matheus ribeiro', 'matheus', '123', 'Sim', 1),
(21, 'caique moreira', 'caique', '123', 'Sim', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`idcaixa`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indexes for table `contatocli`
--
ALTER TABLE `contatocli`
  ADD PRIMARY KEY (`idcontatocli`),
  ADD KEY `contatocli_idcliente_fk` (`idcliente`);

--
-- Indexes for table `contatoestab`
--
ALTER TABLE `contatoestab`
  ADD PRIMARY KEY (`idcontatoestab`),
  ADD KEY `contatoestab` (`idestab`);

--
-- Indexes for table `contatofornec`
--
ALTER TABLE `contatofornec`
  ADD PRIMARY KEY (`idcontatofornec`),
  ADD KEY `contatofornec_idfornec_fk` (`idfornec`);

--
-- Indexes for table `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`idcupom`),
  ADD KEY `cupom_idcaixa_fk` (`idcaixa`),
  ADD KEY `cupom_idfina_fk` (`idfina`) USING BTREE,
  ADD KEY `cupom_idestab_fk` (`idestab`);

--
-- Indexes for table `enderecocli`
--
ALTER TABLE `enderecocli`
  ADD PRIMARY KEY (`idenderecocli`),
  ADD KEY `enderecocli_idcliente_fk` (`idcliente`);

--
-- Indexes for table `enderecoestab`
--
ALTER TABLE `enderecoestab`
  ADD PRIMARY KEY (`idenderecoestab`),
  ADD KEY `enderecoestab_idestab_fk` (`idestab`);

--
-- Indexes for table `enderecofornec`
--
ALTER TABLE `enderecofornec`
  ADD PRIMARY KEY (`idenderecofornec`),
  ADD KEY `enderecofornec_idfornec_fk` (`idfornec`);

--
-- Indexes for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`idestab`);

--
-- Indexes for table `finalizadora`
--
ALTER TABLE `finalizadora`
  ADD PRIMARY KEY (`idfina`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idfornec`);

--
-- Indexes for table `itemcupom`
--
ALTER TABLE `itemcupom`
  ADD KEY `itemcupom_codproduto_fk` (`codproduto`),
  ADD KEY `itemproduto_idcupom_fk` (`idcupom`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caixa`
--
ALTER TABLE `caixa`
  MODIFY `idcaixa` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contatocli`
--
ALTER TABLE `contatocli`
  MODIFY `idcontatocli` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contatoestab`
--
ALTER TABLE `contatoestab`
  MODIFY `idcontatoestab` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contatofornec`
--
ALTER TABLE `contatofornec`
  MODIFY `idcontatofornec` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `idcupom` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecocli`
--
ALTER TABLE `enderecocli`
  MODIFY `idenderecocli` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecoestab`
--
ALTER TABLE `enderecoestab`
  MODIFY `idenderecoestab` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecofornec`
--
ALTER TABLE `enderecofornec`
  MODIFY `idenderecofornec` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `idestab` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finalizadora`
--
ALTER TABLE `finalizadora`
  MODIFY `idfina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idfornec` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contatocli`
--
ALTER TABLE `contatocli`
  ADD CONSTRAINT `contatocli_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `contatoestab`
--
ALTER TABLE `contatoestab`
  ADD CONSTRAINT `contatoestab_ibfk_1` FOREIGN KEY (`idestab`) REFERENCES `estabelecimento` (`idestab`);

--
-- Limitadores para a tabela `contatofornec`
--
ALTER TABLE `contatofornec`
  ADD CONSTRAINT `contatofornec_ibfk_1` FOREIGN KEY (`idfornec`) REFERENCES `fornecedor` (`idfornec`);

--
-- Limitadores para a tabela `cupom`
--
ALTER TABLE `cupom`
  ADD CONSTRAINT `cupom_ibfk_1` FOREIGN KEY (`idestab`) REFERENCES `estabelecimento` (`idestab`),
  ADD CONSTRAINT `cupom_ibfk_2` FOREIGN KEY (`idfina`) REFERENCES `finalizadora` (`idfina`),
  ADD CONSTRAINT `cupom_ibfk_3` FOREIGN KEY (`idcaixa`) REFERENCES `caixa` (`idcaixa`);

--
-- Limitadores para a tabela `enderecocli`
--
ALTER TABLE `enderecocli`
  ADD CONSTRAINT `enderecocli_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Limitadores para a tabela `enderecoestab`
--
ALTER TABLE `enderecoestab`
  ADD CONSTRAINT `enderecoestab_ibfk_1` FOREIGN KEY (`idestab`) REFERENCES `estabelecimento` (`idestab`);

--
-- Limitadores para a tabela `enderecofornec`
--
ALTER TABLE `enderecofornec`
  ADD CONSTRAINT `enderecofornec_ibfk_1` FOREIGN KEY (`idfornec`) REFERENCES `fornecedor` (`idfornec`);

--
-- Limitadores para a tabela `itemcupom`
--
ALTER TABLE `itemcupom`
  ADD CONSTRAINT `itemcupom_ibfk_1` FOREIGN KEY (`codproduto`) REFERENCES `produto` (`idproduto`),
  ADD CONSTRAINT `itemcupom_ibfk_2` FOREIGN KEY (`idcupom`) REFERENCES `cupom` (`idcupom`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
