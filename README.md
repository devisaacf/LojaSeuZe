# Loja do Seu Zé – Seu mercado online de confiança

# O que é a loja do seu Zé?
Na Loja do Seu Zé você encontra tudo o que precisa para o dia a dia, sem sair de casa!
Aqui tem alimentos frescos, bebidas geladinhas, guloseimas irresistíveis e muito mais, tudo com praticidade e aquele cuidado especial que o Seu Zé sempre teve com os clientes.

# Por que uma loja online?
Porque facilita o processo de compra do cliente, trazendo agilidade, eficiência ao consumidor e conforto. Isso atende necessidades como pessoas idosas que possuem dificuldades de locomoção, dentre outros.

# Manual de instalação
* 1 - Instale todos os arquivos. OBS: Menos o arquivo "historia.html, README.md".
* 2 - Crie uma pasta chamada "lojaseuze".
* 3 - Extraia a pasta "imagens.zip", após a pasta ser extraida clique nela e pegue a pasta que estará dentro, arraste a até a pasta "lojaseuze".
* 4 - Após baixar os arquivos, coloque os arquivos dentro da pasta chamada "lojaseuze".
* 5 - Recorte a pasta "lojaseuze"; abra o disco local, abra pasta "xampp", abra pasta "htdocs" e cole dentro dela a pasta "lojaseuze", o caminho ficará assim: C:\xampp\htdocs\lojaseuze.
* 6 - Como deverá ficar sua pasta após esse processo, "lojaseuze" deve conter:  uma pasta "imagens" que clicando nela mostre as imagens,
                                                                               Arquivos: cadastro,conexao, finaliza-compra, forma-de-pagamento, home, login, Loja_do_seu_Ze, lojaze.sql, processa_pagamento, recebe_cadastro, verifica_login
"
* 7 - Abra o seu visual studio code, clique em *arquivo* na parte superior, ache a opção *abrir pasta* e procure a sua pasta(se encontrará no caminho C:\xampp\htdocs\lojaseuze), logo após abra ela.

* 8 - Abra o xampp do seu computador dê start no "Apache e no Mysql" OBS: Verifique a porta que seu Mysql entrega a você, caso ela seja diferente do arquivo "conexao.php" mude a porta no vscode.

* 9 - Ainda com o xampp clique em "admin" que ira estar na linha do mysql. Na URL adicione assim localhost:9999/phpmyadmin/.

* 10 - Clique em importar na parte superior do php e importe o arquivo "lojaze.sql" e clique em confirmar.

# Manual de uso

1 – Página inicial

Ao entrar em nossa loja, o usuário se depara com a página principal, onde são destacados produtos de todas as categorias e seus itens relacionados. Também é exibido o carrinho de compras, caso o usuário queira visualizar os produtos selecionados e seus respectivos valores. Além disso, há opções de categorias específicas, uma barra de pesquisa para localizar itens diretamente e os botões para cadastrar-se ou fazer login.

2 – Cadastro e login

Ao clicar em Cadastrar-se, o usuário é direcionado à página de login ou de cadastro. Caso não possua uma conta, será solicitado que preencha o formulário com as informações correspondentes. Após isso, na página de login, o usuário deve informar seu CPF cadastrado e a senha criada. Confirmadas as informações, ele será redirecionado à página inicial do site, desta vez com sua conta ativada.

3 – Carrinho de compras

Ao clicar em Adicionar ao carrinho em um produto, o usuário recebe, na parte inferior da tela, a notificação com o nome do item e a quantidade adicionada. Ao abrir o carrinho de compras, são mostrados os produtos escolhidos, seus valores e as quantidades selecionadas, havendo a possibilidade de aumentar ou remover itens conforme desejar.

4 – Finalização da compra

Ao clicar em Finalizar compra, o usuário é direcionado para a página onde escolhe a forma de pagamento, sendo elas: débito, crédito ou Pix. Após confirmar a compra, o sistema da loja verifica se o cliente possui cadastro ou já está vinculado a uma conta. Caso ainda esteja utilizando uma conta de convidado, o sistema solicitará login ou cadastro, visto que são necessárias as informações do cliente para a emissão da nota fiscal. Se o usuário já estiver logado, após o pagamento será direcionado para a página da nota fiscal, onde são exibidas as seguintes informações:

Código da nota;

Nome;

Data e hora;

Forma de pagamento utilizada;

Produtos comprados;

Valor total da compra.
