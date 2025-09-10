<?php
include_once 'content.php';
?>
<!DOCTYPE html>
<html lang="pt-BR" class="h-full">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Projeto de Extensão - <?php echo $demandante_nome; ?></title>

<link rel="stylesheet" href="/src/output.css">

</head>
<body class="h-full flex bg-gray-900 text-white">

<!-- Sidebar -->
<aside class="w-1/5 p-8 flex flex-col justify-center gap-8 bg-gray-900">
    <h1 class="text-xl font-extrabold leading-tight">Projeto de Extensão<br>IFSP Guarulhos</h1>
    <nav class="flex flex-col gap-3">
        <button class="nav-button active w-full px-4 py-3 rounded-md text-left text-white bg-green-600" data-tab="tabExtencao">Apresentação</button>
        <button class="nav-button w-full px-4 py-3 rounded-md text-left text-white hover:bg-gray-700" data-tab="tabQuemSomos">Demandante</button>
        <button class="nav-button w-full px-4 py-3 rounded-md text-left text-white hover:bg-gray-700" data-tab="tabDemanda">Demanda</button>
        <button class="nav-button w-full px-4 py-3 rounded-md text-left text-white hover:bg-gray-700" data-tab="tabEquipe">A Equipe</button>
    </nav>
</aside>

<!-- Main -->
<main class="w-4/5 h-full overflow-y-auto p-8 bg-white text-gray-900">

    <!-- Apresentação -->
    <section id="tabExtencao" class="tab-content active rounded-xl p-8 mb-8 bg-white transition-all shadow-md">
        
        <h2 class="text-4xl mb-4 text-center"><?php echo $projeto_titulo; ?></h2>
        <h3 class="text-xl font-semibold mb-2">Apresentação</h3>
        <p class="mb-4"><?php echo $apresentacao; ?></p>
        <h3 class="text-xl font-semibold mb-2">A Nossa Jornada de Extensão</h3>
        <p class="mb-4"><?php echo $apresentacao_jornada; ?></p>
        <p class="mb-4">Nesta plataforma, você acompanhará a jornada de um projeto, que é uma prova desse compromisso. Você vai ver:</p>
        <ol class="list-decimal list-inside mb-4 space-y-1">
            <li>Prospecção de Demandas: Como identificamos os problemas reais da nossa comunidade.</li>
            <li>Gestão de Projetos: Como usamos metodologias ágeis, como o Scrum, para organizar nosso trabalho.</li>
            <li>Documentação Viva: O registro de cada passo, desde os primeiros contatos com os demandantes até as decisões que moldaram nosso projeto.</li>
        </ol>

        <div class="mb-4 p-4 bg-gray-100 rounded-lg text-gray-900 shadow-md">
            <h3 class="font-semibold mb-2">Diário de Bordo</h3>
            <p><?php echo $diario_bordo; ?></p>
        </div>

        <div class="flex justify-end mt-4">
            <img src="assets/logo_1.png" alt="IFSP LOGO" class="h-64">
        </div>
    </section>

    <!-- Demandante -->
    <section id="tabQuemSomos" class="tab-content rounded-xl p-8 mb-8 bg-white">
        <h2 class="text-3xl mb-4 text-center">Demandante</h2>
        <div class="grid gap-6">
            <div>
                <h3 class="text-xl font-semibold mb-2"><?php echo $demandante_nome; ?></h3>
                <p class="mb-2"><?php echo $demandante_apresentacao; ?></p>
                <h4 class="font-semibold mb-1">Cursos Oferecidos</h4>
                <ul class="list-disc list-inside space-y-1">
                    <li><b>Técnicos:</b> Automação Industrial, Informática para Internet, Sistemas de Energia Renovável.</li>
                    <li><b>Graduação:</b> Engenharia de Computação, Engenharia de Controle e Automação, Licenciatura em Matemática, Tecnologias em ADS e Automação Industrial.</li>
                    <li><b>Pós-graduação:</b> Gestão de Sistemas de Informação.</li>
                    <li><b>Extensão:</b> presenciais e a distância.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Demanda -->
    <section id="tabDemanda" class="tab-content rounded-xl p-8 mb-8 bg-white">
        <h2 class="text-3xl mb-4 text-center"><?php echo $demanda_titulo; ?></h2>
        <h3 class="text-xl font-semibold mb-2">Detalhes do Problema</h3>
        <p class="mb-4"><?php echo $demanda_problema_detalhe; ?></p>
        <h3 class="text-xl font-semibold mb-2">Proposta</h3>
        <p class="mb-4"><?php echo $demanda_proposta; ?></p>
        <h3 class="text-xl font-semibold mb-4">Confira nossa entrevista na integra com o representante do Instituto</h3>

        <div class="flex justify-center my-4">
            <div class="w-full max-w-md aspect-video rounded-lg overflow-hidden">
                <iframe
                  src="<?php echo $demandante_video_url; ?>"
                  frameborder="0"
                  allowfullscreen
                  class="w-full h-full block border-0"
                ></iframe>
            </div>
        </div>
    </section>

    <!-- Equipe -->
    <section id="tabEquipe" class="tab-content rounded-xl p-8 mb-8 bg-white">
        <h2 class="text-3xl mb-6 text-center"><?php echo $equipe_titulo; ?></h2>
        <ul class="flex flex-col gap-4">
            <?php foreach ($equipe_integrantes as $integrante): ?>
            <li class="flex items-center bg-gray-100 rounded-lg p-4 hover:bg-gray-200 transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-600 text-white font-bold flex items-center justify-center mr-4">
                    <?php echo substr($integrante['nome'], 0, 1); ?>
                </div>
                <div class="info">
                    <strong class="block font-semibold text-gray-900"><?php echo $integrante['nome']; ?></strong>
                    <p class="text-gray-700 text-sm"><?php echo $integrante['funcao']; ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>

</main>

<script>
const navButtons = document.querySelectorAll('.nav-button');
const tabs = document.querySelectorAll('.tab-content');

function showTab(id) {
    tabs.forEach(tab => tab.classList.add('hidden')); 
    const activeTab = document.getElementById(id);
    if(activeTab) activeTab.classList.remove('hidden');

    navButtons.forEach(btn => btn.classList.remove('bg-green-600', 'text-white'));
    const activeButton = document.querySelector(`.nav-button[data-tab="${id}"]`);
    if(activeButton) activeButton.classList.add('bg-green-600', 'text-white');
}

showTab('tabExtencao');

navButtons.forEach(btn => {
    btn.addEventListener('click', () => showTab(btn.dataset.tab));
});

</script>

</body>
</html>
