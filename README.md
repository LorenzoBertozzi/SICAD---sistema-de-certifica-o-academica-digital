<h1 align="center">SICAD - sistema de certificao academica digital</h1>
<p  align="center">Desenvolvimento de um sistema integrado para certificação de discentes de forma digital </p>

<p align="center" height=200px>
<img loading="lazy" src="http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge">
</p>

## Modelo de implementação no **figma** desenvolvido pelos voluntarios do projeto, Lorenzo Jordani Bertozzi e Lukas julius Wolf Respectivamente.

### Lorenzo model - More Happy and colorfull
https://www.figma.com/design/pPeR91u2Bzt5qi3bvoEDj2/Lorenzo-model---More-Happy-and-colorfull?node-id=4-2&t=RZwnVIImFXSUGPv7-1

### Lukas Model - Site Emissão de Certificados
https://www.figma.com/design/rmXMn765jTDEmE73RjAQke/Site-Emissão-de-Certificados?node-id=0-1&p=f&t=AXB443qAoXdPoGj6-0


## BlockChain - oque é? se aplica ao projeto ? Vale a pena usa-lo ? oque representa do diferencial ?

A blockchain é uma tecnologia de registro distribuído que garante a integridade, imutabilidade e transparência dos dados. Basicamente, é um banco de dados descentralizado onde cada bloco contém informações criptografadas e ligadas ao bloco anterior, formando uma cadeia segura contra fraudes e alterações indevidas.

A blockchain pode ser usada para registrar e validar certificados acadêmicos digitais, garantindo que sejam autênticos, invioláveis e acessíveis publicamente para verificação. Isso resolveria problemas como falsificação de diplomas e dificuldade na validação de credenciais.

Vale a pena usar?
A blockchain pode:

Garantir a imutabilidade dos certificados.
Permitir validação descentralizada, sem necessidade de intermediários.
Criar um sistema mais seguro e transparente.
Por outro lado, desafios incluem:

Custo: Redes blockchain podem ter taxas de transação.
Complexidade: Exige infraestrutura específica e integração com smart contracts.
Diferencial:O uso de blockchain tornaria os certificados autoverificáveis e à prova de fraudes, permitindo que instituições e empregadores validem a autenticidade sem depender de consultas diretas à instituição emissora.

Ethereum (com smart contracts via Solidity)

Hyperledger Fabric (privada e permissionada)

Polygon

## 3. Trabalhos Correlatos
A certificação digital tem sido amplamente estudada como uma solução para garantir autenticidade, integridade e segurança em ambientes digitais. A criptografia assimétrica, que utiliza um par de chaves (pública e privada), é a base para a implementação de certificados digitais, possibilitando a realização de assinaturas digitais que garantem a confiabilidade de documentos eletrônicos (SILVÉRIO, 2011). Esses certificados digitais são emitidos por Autoridades Certificadoras (ACs), que garantem a validade dos dados por meio de um processo de verificação rigoroso, geralmente intermediado por Autoridades de Registro (ARs). Este modelo visa evitar fraudes e assegurar que os certificados sejam confiáveis e verificáveis (HOUSLEY; POLK, 2001).

A crescente digitalização dos serviços tem impulsionado o uso da certificação digital em diversas áreas, incluindo a educação. Estudantes tradicionalmente recebem certificados em formato físico, que, apesar de possuírem elementos de segurança, exigem verificações manuais e a manutenção de registros prolongados pelas instituições emissoras (Gräther et al., 2018). Com o avanço das tecnologias, os certificados digitais surgiram como uma alternativa que facilita o armazenamento e a verificação automática, embora enfrentem desafios como a necessidade de um padrão global de assinatura para assegurar a verificação universal (Grech e Camilleri, 2017).

A ausência de um padrão universal para assinaturas digitais dificulta a interoperabilidade entre sistemas de certificação, levando a soluções proprietárias que limitam a verificação de certificados em ecossistemas fechados. Esse problema se agrava diante da crescente incidência de fraudes acadêmicas, com estimativas apontando a existência de mais de trezentas fábricas de diplomas falsos em operação, gerando um mercado que movimenta mais de quinhentos milhões de dólares por ano (Bear e Ezell, 2005). As consequências dessas fraudes impactam diretamente a credibilidade das instituições educacionais e do mercado de trabalho, tornando essencial a adoção de sistemas de certificação digital robustos e confiáveis (Garwe, 2015).

Diante desse cenário, diversas pesquisas abordam a necessidade de padronização e a busca por soluções mais seguras e eficientes para a certificação acadêmica digital. O padrão X.509v3 tem sido amplamente utilizado devido à sua flexibilidade e extensibilidade, permitindo a inclusão de campos adicionais para diferentes aplicações (COOPER et al., 2008). No entanto, a implementação de protocolos padronizados para comunicação entre ACs e ARs ainda é um desafio, uma vez que muitos sistemas utilizam protocolos próprios, gerando incompatibilidades entre diferentes plataformas de certificação.
Assim, este trabalho se insere nesse contexto ao propor a implementação de um sistema integrado para certificação digital de alunos, explorando tecnologias que garantam a autenticidade, a segurança e a interoperabilidade dos certificados acadêmicos.

SILVÉRIO, Anderson Luiz. Análise e implementação de um protocolo de gerenciamento de certificados. 2011. Trabalho de Conclusão de Curso (Graduação em Ciências da Computação) – Universidade Federal de Santa Catarina, Centro Tecnológico, Florianópolis, 2011. Disponível em: https://repositorio.ufsc.br/handle/123456789/184137.

ANDRADE, Matheus C.; BERTOLDI, Lucas N.; SILVA, Alexandro S.; MATOS, Pablo F.. Sistema de Gerenciamento de Certificados. In: WORKSHOP DE FERRAMENTAS E APLICAÇÕES - SIMPÓSIO BRASILEIRO DE SISTEMAS MULTIMÍDIA E WEB (WEBMEDIA), 28. , 2022, Curitiba. Anais [...]. Porto Alegre: Sociedade Brasileira de Computação, 2022 . p. 99-102. ISSN 2596-1683. DOI: https://doi.org/10.5753/webmedia_estendido.2022.226899.

LIMA, Anderson Ferreira de. Sistema de gerenciamento de certificados e declarações para UTFPR-GP. 2019. 38 f. Trabalho de Conclusão de Curso (Graduação) – Universidade Tecnológica Federal do Paraná, Guarapuava, 2019.

COEMP, C. de Rela¸c˜oes Empresariais e C. REGULAMENTO PARA CERTIFICADOS, DECLARA¸COES E CERTID ˜ OES PARA UTFPR ˜ . [S.l.], 2011. Dispon´ıvel em: <http://www.utfpr.edu.br/apucarana/estrutura-universitaria/diretorias/direc/leis-e-regulamentos/regulamento-para-certificados/at download/file>.

CAGLIARI, André; SILVA, Gustavo; SANTOS, Lucas. [Título do trabalho, se disponível]. 2022. Trabalho de Conclusão de Curso (Graduação) – Universidade Presbiteriana Mackenzie, [local], 2022. Disponível em: https://dspace.mackenzie.br/handle/10899/31154.

















