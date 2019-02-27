        public class GerarRelatorio
    {
        //Variables iniciales
        XFont font15N = new XFont("Arial", 15, XFontStyle.Bold);
        XFont font13N = new XFont("Arial", 13, XFontStyle.Bold);
        XFont font10N = new XFont("Arial", 10, XFontStyle.Bold);
        XFont font10 = new XFont("Arial", 10);
        XFont font8N = new XFont("Arial", 8, XFontStyle.Bold);
        XFont font8 = new XFont("Arial", 8);
        XFont font7 = new XFont("Arial", 7);
        XFont font6 = new XFont("Arial", 6);
        XGraphics graphics = null;
        PdfPage page = null;
        PdfSharp.Drawing.Layout.XTextFormatter textFormatter = null;
        Empresa empresa = new Empresa();
        DadosVenda dadosVenda = new DadosVenda();
        List<Produtos> produtos = new List<Produtos>();

        double y = 30;
        double x = 30;
        double largura = 0;
        double margin = 0;
        double altura = 0;
        double larguralogo = 0;
        double alturalogo = 0;
        double larguracontorno = 0;
        double alturacontorno = 0;
        double inicioobservacao = 0;
        double inicioprodutos = 0;
        double fimprodutos = 0;
        double meio = 0;
        int pagina = 1;

        double c1, c2, c3, c4, c5, c6, c7;

        //////////////////////////////////////////////
    
    
    
    public GerarRelatorio(string fileoutput, Empresa empresa, DadosVenda dadosVenda, List<Produtos> produtos)
        {
            this.empresa = empresa;
            this.dadosVenda = dadosVenda;
            this.produtos = produtos;

            PdfDocument doc = new PdfDocument();

            doc.Info.Author = "TID SOFTWARE SISTEMAS ESPECÍFICOS";
            doc.Info.Creator = "PORTAL DO REPRESENTANTE";
            doc.Info.ModificationDate = DateTime.Now;
            doc.Info.Title = "FORMULARIO DE GARANTIA";
            doc.Info.Subject = "Venda: " + dadosVenda.venda;
            //doc.Info.Producer = "TID SOFTWARE SISTEMAS ESPECÍFICOS";
            doc.Language = "pt-br";

            doc = GerarModelo(doc);
           // doc = AdicionarProdutos(doc);

            doc.Save(fileoutput);
        }

        
        
        
        
        
        private PdfDocument GerarModelo(PdfDocument document)
        {
            page = document.AddPage(); // Nueva pagina
            graphics = XGraphics.FromPdfPage(page);
            textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);

            largura = page.Width;
            altura = page.Height;
            meio = largura / 2;
            larguracontorno = largura - 100;
            alturacontorno = altura - 40;
            margin = 30;
            larguralogo = 86;
            alturalogo = 28;

            var marginInside = margin + 5;

            var sizeColTotal = largura - (margin * 2);
            var sizeCol = sizeColTotal / 3;

            var imagem = @"C:\Users\user\Desktop\AG\PDF\GerarPDF\GerarPDF\logo.jpg";

            //Header
            //Contorno
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(margin, margin-5, largura - margin*2, 80));
            //Contenido
            graphics.DrawImage(XImage.FromFile(imagem), new XRect(margin+12, margin+21, larguralogo, alturalogo));
            textFormatter.DrawString("FUN MOTORS DO BRASIL LTDA", font8N, XBrushes.Black, new XRect(marginInside + 110, margin +5, 200, 20));
            textFormatter.DrawString("Pedido N°: "+"0001", font10N, XBrushes.Black, new XRect(largura-margin - 110, margin + 5, 200, 20));

            textFormatter.DrawString("AV. DR. CASSIO PASCHOAL PADOVANI, 330", font8, XBrushes.Black, new XRect(marginInside + 110, margin +24, 200, 20));
            textFormatter.DrawString("MODUMBI, PIRACICABA - SP", font8, XBrushes.Black, new XRect(marginInside + 110, margin + 39, 200, 20));
            textFormatter.DrawString("F.(19)3374.4620", font8, XBrushes.Black, new XRect(marginInside + 110, margin + 54, 200, 20));

            //Fila1
            var f1Y = margin + 80;
            //Contorno
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(margin, f1Y, largura - margin * 2, 80));
            //Contenido
            textFormatter.DrawString("Cliente:", font8N, XBrushes.Black, new XRect(marginInside, f1Y+5, 200, 20));
            textFormatter.DrawString("CNP-J:", font8N, XBrushes.Black, new XRect(marginInside+50, f1Y +17, 200, 20));
            textFormatter.DrawString("Inscr. Estadual:", font8N, XBrushes.Black, new XRect(marginInside + 200, f1Y + 17, 200, 20));
            textFormatter.DrawString("Endereço:", font8N, XBrushes.Black, new XRect(marginInside, f1Y + 29, 200, 20));
            textFormatter.DrawString("CEP:", font8N, XBrushes.Black, new XRect(marginInside+310, f1Y + 29, 200, 20));
            textFormatter.DrawString("Cidade:", font8N, XBrushes.Black, new XRect(marginInside, f1Y + 41, 200, 20));
            textFormatter.DrawString("Vendedor:", font8N, XBrushes.Black, new XRect(marginInside, f1Y + 53, 200, 20));
            textFormatter.DrawString("E-Mail:", font8N, XBrushes.Black, new XRect(marginInside, f1Y + 65, 200, 20));
            //Contenido del Contenido
            textFormatter.DrawString("3323"+" - "+"LOREM IPSUM DOLOR"+" - " +"LOREM IPSUM DOLOR LTDA", font8, XBrushes.Black, new XRect(marginInside+50, f1Y+5, 250, 20));
            textFormatter.DrawString("43.888.200/0778.66", font8, XBrushes.Black, new XRect(marginInside+80, f1Y + 17, 200, 20));
            textFormatter.DrawString("3423323422", font8, XBrushes.Black, new XRect(marginInside + 263, f1Y + 17, 200, 20));
            textFormatter.DrawString("AV. PREFEITO SAMUEL BATISTA CRUZ, 2433", font8, XBrushes.Black, new XRect(marginInside + 50, f1Y + 29, 200, 20));
            textFormatter.DrawString("23.900-100", font8, XBrushes.Black, new XRect(marginInside + 333, f1Y + 29, 200, 20));
            textFormatter.DrawString("PIRACICABA", font8, XBrushes.Black, new XRect(marginInside+50, f1Y + 41, 200, 20));
            textFormatter.DrawString("LOREM IPSUM DOLOR SIT", font8, XBrushes.Black, new XRect(marginInside + 50, f1Y + 53, 200, 20));
            textFormatter.DrawString("loremipsumdolorsit@gmail.com", font8, XBrushes.Black, new XRect(marginInside+50, f1Y + 65, 200, 20));
            //Fila2
            var f2Y = f1Y + 85;
            //Contorno
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(margin, f2Y, largura - margin * 2, 600));
            // TABLA
            graphics.DrawRectangle(XPens.Black, XBrushes.LightGray, new XRect(margin, f2Y, largura - margin * 2, 20));
            graphics.DrawRectangle(XPens.Black, XBrushes.Transparent, new XRect(margin, f2Y, 25, 600));
            graphics.DrawRectangle(XPens.Black, XBrushes.Transparent, new XRect(margin + 25, f2Y, 425, 600));
            textFormatter.DrawString("lt.", font8N, XBrushes.Black, new XRect(marginInside+4, f2Y+5, 200, 20));
            textFormatter.DrawString("Descrição", font8N, XBrushes.Black, new XRect(marginInside + 200, f2Y + 5, 200, 20));
            textFormatter.DrawString("Unidade", font8N, XBrushes.Black, new XRect(marginInside + 470, f2Y + 5, 200, 20));


            //Produtos
            var f3Y = f2Y + 20;
            textFormatter.DrawString("0001", font8, XBrushes.Black, new XRect(margin+3, f3Y + 5, 200, 20));
            textFormatter.DrawString("Lorem Ipsum Dolor Sit Amet", font8, XBrushes.Black, new XRect(marginInside+25, f3Y + 5, 200, 20));
            textFormatter.DrawString("UN", font8, XBrushes.Black, new XRect(marginInside + 450, f3Y + 5, 200, 20));
            graphics.DrawRectangle(XPens.Black, XBrushes.Transparent, new XRect(margin, f3Y+20, largura-(margin*2), 0));

            f3Y += 20;
            textFormatter.DrawString("0001", font8, XBrushes.Black, new XRect(margin + 3, f3Y + 5, 200, 20));
            textFormatter.DrawString("Lorem Ipsum Dolor Sit Amet", font8, XBrushes.Black, new XRect(marginInside + 25, f3Y + 5, 200, 20));
            textFormatter.DrawString("UN", font8, XBrushes.Black, new XRect(marginInside + 450, f3Y + 5, 200, 20));
            graphics.DrawRectangle(XPens.Black, XBrushes.Transparent, new XRect(margin, f3Y + 20, largura - (margin * 2), 0));

            return document;
        }