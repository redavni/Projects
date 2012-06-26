using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;

namespace Noted.Classes
{
    static class NoteManager
    {

        #region Private Members

        private static List<Category> _categories;

        #endregion

        #region Properties

        public static List<Category> Categories
        {
            get { return _categories; }
            set { _categories = value; }
        }   

        #endregion

        #region Methods

        public static void SaveNotes()
        {
            foreach (Category c in _categories)
            {

            }
        }

        public static void BackupToDatabase()
        {

        }

        public static void RemoveCategory(Category c)
        {

        }

        public static void RemoveNote(Category c, Note n)
        {

        }

        #endregion

    }
}
