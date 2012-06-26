using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Noted.Classes
{
    public class Category
    {

        #region Private members

        private string _name;
        private List<Note> _notes = new List<Note>();
        private List<Category> _categories = new List<Category>();

        private List<Entry> _children = new List<Entry>();

        #endregion

        #region Properties

        public string Name
        {
            get { return _name; }
            set { _name = value; }
        }

        public List<Note> Notes
        {
            get { return _notes; }
        }

        public List<Category> Categories
        {
            get { return _categories; }
            set { _categories = value; }
        }

        public List<Object> Children
        {
            get
            {
                List<object> objList = new List<object>();
                foreach (var cat in _categories)
                {
                    objList.Add(cat);
                }

                foreach (var note in _notes)
                {
                    objList.Add(note);
                }

                return objList;
            }
        }

        #endregion

        #region Methods


        public override string ToString()
        {
            return Name;
        }

        public void AddNote(Note n)
        {
            _notes.Add(n);
        }

        #endregion
    }
}
