# Genesis School - Portal Web

Bem-vindo ao repositório do site profissional Genesis School! Um site vitrine completo e moderno para apresentação da escola, com informações sobre matrícula, avisos, eventos e tour virtual 360°.

## 🎯 Características

- ✅ **100% PHP Puro** - Sem frameworks desnecessários
- ✅ **Responsivo** - Funciona perfeitamente em desktop, tablet e mobile
- ✅ **Profissional** - Design moderno e elegante com Bootstrap 5
- ✅ **Rápido** - Otimizado para performance
- ✅ **SEO Friendly** - Estrutura semântica otimizada
- ✅ **Acessível** - Compatível com leitores de tela
- ✅ **Seguro** - Implementação de boas práticas de segurança

## 📋 Páginas Incluídas

- **Home** - Página inicial com destaques
- **Sobre** - Informações sobre a escola, missão e valores
- **Matrícula** - Processo de inscrição e documentação necessária
- **Avisos** - Sistema de notícias e comunicados
- **Eventos** - Calendário e informações sobre eventos
- **Tour 360°** - Visita virtual das instalações (pronto para Street View/Matterport)

## 🏗️ Estrutura do Projeto

```
genesis-school-portal/
├── public/                  # Diretório web root (acessível via browser)
│   ├── index.php           # Arquivo principal - ponto de entrada
│   ├── .htaccess           # Configuração Apache
│   └── assets/
│       ├── css/
│       │   └── style.css   # Estilos profissionais
│       ├── js/
│       │   └── script.js   # Funcionalidades JavaScript
│       └── images/         # Pasta para imagens
├── app/                     # Páginas da aplicação
│   ├── home.php            # Página inicial
│   ├── about.php           # Sobre a escola
│   ├── enrollment.php      # Matrícula
│   ├── news.php            # Avisos e notícias
│   ├── events.php          # Eventos
│   └── tour.php            # Tour 360°
├── config/
│   └── config.php          # Configurações globais
├── includes/               # Arquivos compartilhados
│   ├── header.php          # Header reutilizável
│   └── footer.php          # Footer reutilizável
└── README.md               # Este arquivo
```

## 🚀 Como Usar

### Requisitos
- PHP 7.4+ 
- Apache com mod_rewrite habilitado
- XAMPP/WAMP/LAMP instalado

### Instalação

1. **Clone ou copie os arquivos para o diretório** `htdocs`:
   ```bash
   C:\xampp\htdocs\genesis-school-portal\
   ```

2. **Abra no navegador**:
   ```
   http://localhost/genesis-school-portal/public/
   ```

3. **Configure as informações da escola** em `config/config.php`:
   ```php
   define('SCHOOL_NAME', 'Sua Escola');
   define('SCHOOL_PHONE', '(XX) XXXXX-XXXX');
   define('SCHOOL_EMAIL', 'contato@suaescola.com.br');
   define('SCHOOL_ADDRESS', 'Endereço da sua escola');
   ```

### Navegação

O site usa query string `?page=` para navegação:
- `?page=home` - Página inicial
- `?page=about` - Sobre a escola
- `?page=enrollment` - Matrícula
- `?page=news` - Avisos
- `?page=events` - Eventos
- `?page=tour` - Tour 360°

## 🎨 Customização

### Cores
Edite as variáveis CSS em `public/assets/css/style.css`:
```css
:root {
    --primary-color: #0d6efd;
    --secondary-color: #6c757d;
    /* ... mais cores ... */
}
```

### Informações da Escola
Atualize em `config/config.php`:
```php
define('SCHOOL_NAME', 'Seu Nome');
define('SCHOOL_PHONE', 'Seu Telefone');
define('SCHOOL_EMAIL', 'Seu Email');
define('SCHOOL_ADDRESS', 'Seu Endereço');
```

### Conteúdo das Páginas
Edite os arquivos em `app/` para modificar o conteúdo das páginas.

## 🔌 Integrações Futuras

### Street View / Tour 360°
A página `app/tour.php` está preparada para integração com:
- **Google Street View** - Para ambientes fotografados por Street View
- **Matterport** - Para tours 3D profissionais
- **Panellum** - Para panoramas em 360°

Basta adicionar o código de embed na área reservada em `app/tour.php`.

### Sistema de Contato
Formulários estão prontos para integração com:
- PHP Mail
- SendGrid
- SMTP

### Newsletter
Sistema preparado para integração com serviços de email marketing:
- Mailchimp
- SendGrid
- etc.

## 🔒 Segurança

- ✅ Headers de segurança configurados
- ✅ Proteção contra MIME type sniffing
- ✅ Proteção contra clickjacking
- ✅ Proteção XSS básica
- ✅ Diretórios sensíveis protegidos via `.htaccess`

### Recomendações Adicionais
1. Implementar validação e sanitização de inputs
2. Usar HTTPS obrigatoriamente
3. Implementar rate limiting
4. Atualizações regulares de PHP

## 📊 Performance

O site foi otimizado para:
- **Gzip Compression** - Habilitado
- **Browser Caching** - Configurado
- **CSS e JS Minificados** - Bootstrap CDN
- **Lazy Loading** - Pronto para implementação

## 🌍 Compatibilidade

- ✅ Chrome / Chromium
- ✅ Firefox
- ✅ Safari
- ✅ Edge
- ✅ IE 11+ (com limitações)
- ✅ Dispositivos móveis

## 📱 Responsividade

Site totalmente responsivo com breakpoints:
- **Desktop**: 1200px+
- **Tablet**: 768px - 1199px
- **Mobile**: < 768px

## 🎓 Melhorias Futuras

- [ ] Sistema de gerenciamento de conteúdo (painel admin)
- [ ] Integração com banco de dados
- [ ] Sistema de blog
- [ ] Galeria multimídia
- [ ] Sistema de pagamento de matrícula
- [ ] Portal do aluno
- [ ] Chat de atendimento
- [ ] Integração com redes sociais

## 📝 Licença

Este projeto é fornecido como está para uso educacional e comercial.

## 👥 Suporte

Para dúvidas ou sugestões, entre em contato através dos canais da escola:

📧 Email: contato@genesisschool.com.br
📱 Telefone: (XX) XXXXX-XXXX
📍 Endereço: Rua Exemplo, 123

---

**Genesis School - Qualidade em Educação** © 2024
