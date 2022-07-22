<?php
    interface operacoesDeFilas {
        public function enfileirar(string $item);
        public function desinfileirar();
        public function espiar();
        public function estaVazia();
    }

    class fila implements operacoesDeFilas {
        private $limite;
        private $fila;

        public function __construct(int $limite = 25) 
        {
            $this->limite = $limite;
            $this->fila = [];
        }

        public function espiar() 
        {
            return current($this->fila);
        }
        
        public function desinfileirar(): string 
        {
            if ($this->estaVazia()) {
                throw new UnderflowException('A fila está vazia');
            } else {
                return array_shift($this->fila);
            }
        }

        public function enfileirar(string $novoElemento) 
        {
            if (count($this->fila) < $this-limite) {
                array_push($this->fila, $novoElemento);
            } else {
                throw new OverflowException('A fila está cheia');
            }
            
        }

        public function estaVazia() 
        {
            return empty($this->fila);
        }
    }
