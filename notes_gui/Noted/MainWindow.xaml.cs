using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using Noted.Classes;

namespace Noted
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        private int _lastCaret;
        private int row = 1;
        private int col = 0;

        private List<Category> _categories;

        public MainWindow()
        {
            InitializeComponent();

            _categories = new List<Category>();
            Random rand = new Random(System.DateTime.Now.Millisecond);
            for (int i = 0; i < 5; ++i)
            {
                Category c = new Category();
                c.Name = "Category " + Convert.ToString(i + 1);

                Category innerc = new Category();
                innerc.Name = "Inner Category";

                for (int j = 0; j < (rand.Next(5)); ++j)
                {
                    Note n = new Note();
                    n.Name = "Note " + (j + 1);
                    c.Notes.Add(n);
                    innerc.Notes.Add(n);
                }

                c.Categories.Add(innerc);

                _categories.Add(c);
            }

            NoteManager.Categories = _categories;

            treeViewFiles.ItemsSource = NoteManager.Categories;

        }

        private void MenuItem_Click(object sender, RoutedEventArgs e)
        {
            TabItem ti = new TabItem();
            ti.Header = "New File";
            
            ContextMenu contextMenu = new System.Windows.Controls.ContextMenu();
            MenuItem menuItemCloseFile = new MenuItem() { Header = "Close" };
            contextMenu.Items.Add(menuItemCloseFile);

            ti.ContextMenu = contextMenu;

            TextBox tb = new TextBox() { AcceptsReturn = true, AcceptsTab = true, VerticalScrollBarVisibility = ScrollBarVisibility.Auto, 
                                         TextWrapping = TextWrapping.Wrap };

            tb.TextChanged += new TextChangedEventHandler(tb_TextChanged);

            ti.Content = tb;
            tabControlFiles.Items.Add(ti);
            tabControlFiles.SelectedItem = ti;

            _lastCaret = tb.CaretIndex;
            //labelStatus.Content = Convert.ToString(RenderCapability.Tier >> 16);
        }

        void tb_TextChanged(object sender, TextChangedEventArgs e)
        {
            TextBox tb = sender as TextBox;

            col = tb.CaretIndex;
            labelStatus.Content = String.Format("Row: {0}, Col: {1}", row, col);
        }

        private void MenuItemExit_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.MainWindow.Close();
        }

        private void treeViewFiles_SelectedItemChanged(object sender, RoutedPropertyChangedEventArgs<object> e)
        {
            Category c = treeViewFiles.SelectedValue as Category;
            TreeViewItem tvi = treeViewFiles.SelectedItem as TreeViewItem;
            Note n = null;

            if (c != null)
            {
                labelStatus.Content = "Category";
            }
            else
            {
                n = treeViewFiles.SelectedValue as Note;
                if (n != null)
                    labelStatus.Content = "Note";
            }

        }
    }
}
