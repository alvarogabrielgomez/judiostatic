using MigraDoc.DocumentObjectModel;
using MigraDoc.Rendering;
using PdfSharp.Drawing;
using PdfSharp.Pdf;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace GerarPDF.Classes
{
    public class GerarRelatorio
    {
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
            doc.Language = "pt-br";

            doc = GerarModelo(doc);
            doc = AdicionarProdutos(doc);

            doc.Sav e(fileoutput);
        }

        private PdfDocument GerarModelo(PdfDocument document)
        {
            page = document.AddPage();
            graphics = XGraphics.FromPdfPage(page); 
            textFormatter = new PdfSharp.Drawing.Layout.XTextFormatter(graphics);

            y = 30;
            x = 30;
            largura = page.Width;
            altura = page.Height;
            larguralogo = 170;
            alturalogo = 56;
            larguracontorno = largura - 40;
            alturacontorno = altura - 40;
            inicioobservacao = alturacontorno - 80;

            meio = largura / 2;

            double y2 = 0;
            double x2 = 0;
            var imagem = @"C:\Users\user\Desktop\AG\PDF\GerarPDF\GerarPDF\logotipo.png";


            //CONTORNO DA PAGINA
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(20, 20, larguracontorno, alturacontorno));
 
            //HEADER
            //LOGOTIPO
            graphics.DrawImage(XImage.FromFile(imagem), new XRect(x, y, larguralogo, alturalogo));
            x2 = meio;
            y += 10;
            textFormatter.DrawString(empresa.nome, font8N, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y2 = y + 14;
            textFormatter.DrawString(empresa.endereco + ", " + empresa.bairro + ", " + empresa.cidade + ", " + empresa.cep, font6, XBrushes.Black, new XRect(x2, y2, largura - 10, altura - 10));
            y2 += 10;
            textFormatter.DrawString("E-mail: " + empresa.email, font6, XBrushes.Black, new XRect(x2, y2, largura - 10, altura - 10));
            y2 += 10;
            textFormatter.DrawString("Site: " + empresa.site, font6, XBrushes.Black, new XRect(x2, y2, largura - 10, altura - 10));
            //DIVISAO DO HEADER E BODY
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(x, y + alturalogo, largura - 60, 0));
            //FIM DO HEADER


            //DADOS DA VENDA
            y += alturalogo + 10;
            //x2 += 50;
            textFormatter.DrawString("Data de lançamento: " + dadosVenda.datalancamento, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor dos produtos: " + dadosVenda.valorprodutos, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 10;
            textFormatter.DrawString("Contato: " + dadosVenda.contato, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor do ICMS: " + dadosVenda.valoricms, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 10;
            textFormatter.DrawString("Cliente: " + dadosVenda.cliente, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor do IPI: " + dadosVenda.valoripi, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 10;
            textFormatter.DrawString("Condição de pagamento: " + dadosVenda.condicaopagto, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor do ST: " + dadosVenda.valorst, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 10;
            textFormatter.DrawString("Data de entrega: " + dadosVenda.dataentrega, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor do frete: " + dadosVenda.valorfrete, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 10;
            textFormatter.DrawString("Transportadora: " + dadosVenda.transportadora, font7, XBrushes.Black, new XRect(x, y, largura - 10, altura - 10));
            textFormatter.DrawString("Valor total: " + dadosVenda.valortotal, font7, XBrushes.Black, new XRect(x2, y, largura - 10, altura - 10));
            y += 15;

            //DIVISAO DO DADOSVENDA E PRODUTOS
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(x, y, largura - 60, 0));

            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Center;
            y += 12;
            textFormatter.DrawString("Lista de produtos", font10N, XBrushes.Black, new XRect(x, y, larguracontorno, 10));

            inicioprodutos = y + 10;
            fimprodutos = inicioobservacao - 10;


            //DIVISAO LISTAPRODUTOS E OBSERVAÇÃO
            y = inicioobservacao;
            graphics.DrawRectangle(XPens.Black, XBrushes.White, new XRect(x, y, largura - 60, 0));

            textFormatter.Alignment = PdfSharp.Drawing.Layout.XParagraphAlignment.Left;
            y += 8;
            textFormatter.DrawString("Observação", font10N, XBrushes.Black, new XRect(x, y, larguracontorno, 10));
            y += 15;
            textFormatter.DrawString(dadosVenda.observacao, font7, XBrushes.Black, new XRect(x, y, larguracontorno, 10));

            y = page.Height.Point - 28;
            DateTime hoje = DateTime.Now;
            var data = hoje.ToString("dd/MM/yyyy");
            var hora = hoje.ToString("HH:mm:ss");

            textFormatter.DrawString("Pag: " + pagina.ToString() + " - " + data + "-" + hora, font6, XBrushes.Black, new XRect(larguracontorno - 60, y, 100, 100));

            return document;
        }

        private PdfDocument AdicionarProdutos(PdfDocument doc)
        {
            x = 30;
            y = inicioprodutos + 12;
            double x2 = x;

            double linha = y;

            textFormatter.DrawString("Descrição", font8N, XBrushes.Black, new XRect(x, y, 250, 10));
            c1 = x;
            x2 += 250;
            c2 = x2;
            textFormatter.DrawString("UN", font8N, XBrushes.Black, new XRect(x2, y, 30, 10));
            x2 += 30;
            c3 = x2;
            textFormatter.DrawString("Qtd", font8N, XBrushes.Black, new XRect(x2, y, 50, 10));
            x2 += 50;
            c4 = x2;
            textFormatter.DrawString("R$ Unit", font8N, XBrushes.Black, new XRect(x2, y, 50, 10));
            x2 += 50;
            c5 = x2;
            textFormatter.DrawString("R$ IPI", font8N, XBrushes.Black, new XRect(x2, y, 50, 10));
            x2 += 50;
            c6 = x2;
            textFormatter.DrawString("R$ ST", font8N, XBrushes.Black, new XRect(x2, y, 50, 10));
            x2 += 50;
            c7 = x2;
            textFormatter.DrawString("R$ Total", font8N, XBrushes.Black, new XRect(x2, y, 50, 10));

            linha += 12;
            int contador = 0;
            foreach (var item in produtos)
            {

                if (contador > 40)
                {
                    doc = NovaPagina(doc);
                    x = 30;
                    y = inicioprodutos + 12;
                    contador = 0;
                    linha = y;
                }

                if (contador % 2 == 1)
                {
                    graphics.DrawRectangle(XPens.Gray, XBrushes.LightGray, new XRect(x - 1, linha - 2, larguracontorno - 20, 12));
                }
                else
                {
                    graphics.DrawRectangle(XPens.Gray, XBrushes.White, new XRect(x - 1, linha - 2, larguracontorno - 20, 12));
                }

                textFormatter.DrawString(item.nome, font7, XBrushes.Black, new XRect(c1, linha, 100, 10));
                textFormatter.DrawString(item.unidade, font7, XBrushes.Black, new XRect(c2, linha, 20, 10));
                textFormatter.DrawString(item.quantidade.ToString(), font7, XBrushes.Black, new XRect(c3, linha, 20, 10));
                textFormatter.DrawString(item.valorunitario.ToString("F2"), font7, XBrushes.Black, new XRect(c4, linha, 20, 10));
                textFormatter.DrawString(item.valoripi.ToString("F4"), font7, XBrushes.Black, new XRect(c5, linha, 20, 10));
                textFormatter.DrawString(item.valorst.ToString("F2"), font7, XBrushes.Black, new XRect(c6, linha, 20, 10));
                textFormatter.DrawString(item.valortotal.ToString("F2"), font7, XBrushes.Black, new XRect(c7, linha, 50, 10));

                linha += 12;
                contador += 1;
            }
            return doc;
        }

        private PdfDocument NovaPagina(PdfDocument document)
        {
            pagina += 1;
            document = GerarModelo(document);
            return document;
        }
    }
}