# Sistema para controle de clientes

O sistema visa oferecer uma estrutura para administrar um software multiclientes.

O módulo PAINEL fornece as funcionalidades de consultar/inserir/editar/excluir empresas e usuários que utilizarão o módulo WEB.

O módulo WEB é um sistema em si, podendo ser qualquer tipo de software de gestão.

---

Módulos:
 - PAINEL
   - Cadastrar empresas;
   - Cadastrar usuários;
 - WEB
   - Atualizar dados da empresa;
   - Atualizar dados de usuário;
   - Alterar senha;

Padrões utilizados:
 - PSR-4;
 - Container para injeção de depêndencias;
 - Singleton;

_*Este projeto foi desenvolvido em caráter de estudo para implementar as menlhores práticas de clean architecture e clean code._

