@extends('layout')
@section('principal')

<h1>Bem-vindo administrador {{ Auth::user()->name }}!</h1>
<h4>><a href="/relatoriovendas">Gerar Relatório de Vendas</a></h4>
<h4>><a href="/relatorioclientes">Gerar Relatório de Clientes</a></h4>
<h2>Gráfico de Estoque</h2>
<div style="width: 100%; height: 60%;">
    <canvas id="graficoEstoque"></canvas>
</div>

<style>
    #graficoEstoque {
        position: absolute;
        top: 100vh;
        transform: translateY(-100%);
        width: 100%;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        const ctx = document.getElementById('graficoEstoque').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($produtos->pluck('nome')) !!},
                datasets: [{
                    label: 'Unidades em Estoque',
                    data: {!! json_encode($produtos->pluck('qtde_estoque')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection