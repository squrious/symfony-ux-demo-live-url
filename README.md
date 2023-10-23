# Demo application for live URL LiveProp

## Installation

1. Get my Symfony UX fork

```bash
git clone https://github.com/squrious/symfony-ux
cd symfony-ux && git checkout live_component_url_prop
```

2. Clone this project
```bash
git clone https://github.com/squrious/symfony-ux-demo-live-url.git
```

3. Configure the demo application to use the fork

```bash
cd symfony-ux-demo-live-url \ 
  && composer install \
  && cd ../symfony-ux \
  && ./link ../symfony-ux-demo-live-url \
  && cd -
```

4. Run the project

```bash
symfony serve --no-tls
```

5. Visit `http://localhost:8000`