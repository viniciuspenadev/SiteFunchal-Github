<?php
$JOBS = [
    [
        'id' => 'representante-comercial',
        'title' => 'Representante Comercial',
        'department' => 'Vendas',
        'location' => 'Tatuapé, São Paulo - SP',
        'type' => 'PJ / Comissionado',
        'workload' => 'Flexível',
        'summary' => 'Busca-se profissional dinâmico para expansão de carteira de clientes no setor de food service.',
        'description' => 'Responsável por prospectar novos clientes (restaurantes, hotéis, buffets), apresentar nosso catálogo de produtos premium e gerenciar pedidos. Necessário experiência no setor alimentício.',
        'requirements' => [
            'Experiência em vendas externas;',
            'Carteira de clientes ativa (diferencial);',
            'Veículo próprio;',
            'Boa comunicação e persistência.'
        ],
        'benefits' => [
            'Comissões agressivas;',
            'Premiações por meta;',
            'Treinamento especializado sobre pescados.'
        ],
        'posted_at' => date('Y-m-d', strtotime('-2 days'))
    ],
    [
        'id' => 'auxiliar-logistica',
        'title' => 'Auxiliar de Logística',
        'department' => 'Operacional',
        'location' => 'Tatuapé, São Paulo - SP',
        'type' => 'CLT',
        'workload' => '44h semanais',
        'summary' => 'Profissional para auxiliar na separação, conferência e expedição de mercadorias no centro de distribuição.',
        'description' => 'Atuar no recebimento, conferência e separação de pedidos. Garantir o correto armazenamento dos produtos em câmaras frias e auxiliar no carregamento dos veículos de entrega.',
        'requirements' => [
            'Ensino Médio completo;',
            'Experiência em logística/armazém;',
            'Disponibilidade para atuar em câmaras frias;',
            'Residir próximo à Vila Leopoldina.'
        ],
        'benefits' => [
            'Vale Transporte;',
            'Vale Refeição;',
            'Cesta Básica;',
            'Adicional de Insalubridade.'
        ],
        'posted_at' => date('Y-m-d', strtotime('-5 days'))
    ],
    [
        'id' => 'motorista-entregador',
        'title' => 'Motorista de Entrega (Refrigerado)',
        'department' => 'Logística',
        'location' => 'Tatuapé, São Paulo - SP',
        'type' => 'CLT',
        'workload' => '44h semanais',
        'summary' => 'Motorista responsável pela entrega de produtos perecíveis com qualidade e pontualidade.',
        'description' => 'Realizar entregas em restaurantes e estabelecimentos parceiros, conferir notas fiscais e mercadorias no ato da entrega, zelar pela conservação do veículo e da carga.',
        'requirements' => [
            'CNH categoria C ou D;',
            'Experiência com veículos refrigerados;',
            'Conhecimento das rotas de São Paulo;',
            'Pontualidade e responsabilidade.'
        ],
        'benefits' => [
            'Vale Refeição;',
            'Seguro de Vida;',
            'Vale Transporte;',
            'Participação nos Lucros.'
        ],
        'posted_at' => date('Y-m-d', strtotime('-1 week'))
    ]
];
?>